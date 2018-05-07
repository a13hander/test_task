<?php
/**
 * Created by PhpStorm.
 * User: a13hander
 * Date: 07.05.18
 * Time: 15:40
 */

namespace App\Services;

use App\Models\Make;
use App\Models\Model;
use App\Models\Car;

class ImportUsedCarsService
{
    public function loadInDB($file)
    {
        $xml = new \DOMDocument();
        $xml->load($file);

        if (empty($xml)) {
            return false;
        }

        /* Оборачиваем в транзакцию, файл или обработается полностью или не будет обработан вообще.
        *  Дает возможность перезапускать команду после исправления файла и избегать дублей в БД.
        *  ВНИМАНИЕ! Если файл большой, то транзакция на сервере может быть отменена по таймауту.
        *  Как вариант можно хранить модели в массиве и после разбора xml работать с массивом моделей,
        *  что черевато высоким потреблением памяти. Если дубли не проблема, то нужно бить на часть и
         * обрабатывать файл частями.
        */
        \DB::transaction(function () use($xml) {
            foreach ($xml->getElementsByTagName('Ad') as $ad) {
                $import_id = $ad->getElementsByTagName('id')[0]->textContent;
                $price = $ad->getElementsByTagName('Price')[0]->textContent;
                $kilometrage = $ad->getElementsByTagName('Kilometrage')[0]->textContent;
                $make = $ad->getElementsByTagName('Make')[0]->textContent;
                $car_model = $ad->getElementsByTagName('Model')[0]->textContent;
                $y = $ad->getElementsByTagName('Year')[0]->textContent;
                $body_type = $ad->getElementsByTagName('BodyType')[0]->textContent;
                $doors = $ad->getElementsByTagName('Doors')[0]->textContent;
                $color = $ad->getElementsByTagName('Color')[0]->textContent;
                $fuel_type = $ad->getElementsByTagName('FuelType')[0]->textContent;
                $engine_size = $ad->getElementsByTagName('EngineSize')[0]->textContent;
                $power = $ad->getElementsByTagName('Power')[0]->textContent;
                $transmission = $ad->getElementsByTagName('Transmission')[0]->textContent;
                $drive_type = $ad->getElementsByTagName('DriveType')[0]->textContent;
                $images = [];

                foreach ($ad->getElementsByTagName('Image') as $img) {
                    $images[] = $img->getAttribute('url');
                }

                $brand = Make::firstOrCreate(['name' => $make]);
                $model = Model::where('name', $car_model)->where('make_id', $brand->id)->first();

                if (empty($model)) {
                    $model = Model::make(['name' => $car_model]);
                    $model->brand()->associate($brand);
                    $model->saveOrFail();
                }

                $car = Car::make(compact(
                    'import_id',
                    'price',
                    'kilometrage',
                    'y',
                    'body_type',
                    'doors',
                    'color',
                    'fuel_type',
                    'engine_size',
                    'power',
                    'transmission',
                    'drive_type',
                    'images'
                ));

                $car->model()->associate($model);
                $car->saveOrFail();
            }
        });

        return true;
    }

}