<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function filter(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'priceFrom' => 'nullable|numeric',
            'priceTo' => 'nullable|numeric',
            'yearFrom' => 'nullable|date_format:Y',
            'yearTo' => 'nullable|date_format:Y',
            'bodyType' => 'nullable|string',
            'make' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $data = $validator->getData();
        $q = DB::table('cars');

        if (isset($data['make'])) {
            $q
                ->select(DB::raw('cars.*'))
                ->join('models', 'models.id', '=', 'cars.model_id')
                ->join('makes', 'models.make_id', '=', 'makes.id')
                ->where('makes.name', $data['make']);
        }

        if (isset($data['priceFrom'])) {
            $q->where('price', '>=', $data['priceFrom']);
        }

        if (isset($data['priceTo'])) {
            $q->where('price', '<=', $data['priceTo']);
        }

        if (isset($data['yearFrom'])) {
            $q->where('y', '>=', $data['yearFrom']);
        }

        if (isset($data['yearTo'])) {
            $q->where('y', '<=', $data['yearTo']);
        }

        if (isset($data['bodyType'])) {
            $q->where('body_type', '=', $data['bodyType']);
        }

        return $q->get();
    }
}
