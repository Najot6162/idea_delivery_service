<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Http\Resources\BranchResource;
use App\Models\CarTerm;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function createCar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'number' => 'required',
            'model' => 'required',
            'active' => 'requred'
        ]);

        $car = new CarModel();
        $car->number = $request->number;
        $car->model = $request->model;
        $car->active = $request->active;

        if ($car->save()) {
            echo "car saved  ";
        };
        return true;
    }

    public function getAllCars(Request $request)
    {
        $pageCount = $request['page'] ?? "10";
        $cars = CarModel::with('car_term')->paginate($pageCount);
        return BranchResource::collection($cars);
    }

    public function updateCar(Request $request, $id)
    {
        if ($request->status) {
            $car = CarModel::findOrFail($id);
            $car->active = $request->active;
            if ($car->save()) {
                echo "car saved  ";
            };
            return true;
        }

        $request->validate([
            'number' => 'required',
            'model' => 'required',
            'active' => 'requred'
        ]);
        $car = CarModel::findOrFail($id);
        $car->number = $request->number;
        $car->model = $request->model;
        $car->active = $request->active;

        if ($car->save()) {
            echo "car updated  ";
        };
        return true;
    }

    public function deleteCar($id)
    {
        $car = CarModel::findOrFail($id);
        if ($car->delete()) {
            return new BranchResource($car);
        }
    }

    public function getCarTerm($id)
    {
        $car_term = CarTerm::findOrFail($id);
        return BranchResource::collection($car_term);
    }

    public function updateCarTerm(Request $request, $id)
    {

        $request->validate([
            'car_model_id' => 'required',
            'insure_date' => 'required',
            'attorney_date' => 'requred',
            'attorney' => 'required',
            'adver_date' => 'required',
            'technical_date' => 'requred'
        ]);

        $car_term = CarTerm::findOrFail($id);
        $car_term->car_model_id = $request->car_model_id;
        $car_term->insure_date = $request->insure_date;
        $car_term->attorney_date = $request->attorney_date;
        $car_term->adver_date = $request->adver_date;
        $car_term->technical_date = $request->technical_date;
        $car_term->attorney = $request->attorney;

        if ($car_term->save()) {
            echo "car_term updated  ";
        };

        return true;
    }
}
