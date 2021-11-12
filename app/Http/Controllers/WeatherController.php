<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function index()
    {
        $products = Weather::all()->toArray();
        return array_reverse($products);
    }

    public function store(Request $request)
    {
        $product = new Weather([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $product->save();

        return response()->json('Weather created!');
    }

    public function show($id)
    {
        $product = Weather::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Weather::find($id);
        $product->update($request->all());

        return response()->json('Weather updated!');
    }

    public function destroy($id)
    {
        $product = Weather::find($id);
        $product->delete();

        return response()->json('Weather deleted!');
    }
}


