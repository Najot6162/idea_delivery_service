<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
class CarController extends Controller
{
    public function createCar(Request $request){
        $request->validate([
            'number'=>'required',
            'model'=>'required',
            'active'=>'requred'
        ]);

        $car = new CarModel();
        $car->number = $request->number;
        $car->model = $request->model;
        $car->active = $request->active;

        if($car->save()){
            echo "car saved  ";
        };

    }
}
