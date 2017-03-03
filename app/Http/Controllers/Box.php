<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Box extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function list()
    {
        return view('list');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'weight' => 'required',
            'color' => 'required|size:7|colorishex|colorisnotblue',
            'destination' => 'required',
        ]);

        $box = new App\Box();

        $box->name          = $request->name;
        $box->weight        = $request->weight;
        $box->destination   = $request->destination;
        $box->color         = $request->color;

        $box->save();

        return response()->json([['Added']]);

    }

    public function getAll() {
        /** @var $item App\Box */
        return response()->json(
            (new App\Box)
            ->all()
            ->transform(function ($item) {
                return $item->calcShippingCost();
            })
        );
    }

}
