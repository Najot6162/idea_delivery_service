<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BranchResource;
use App\Models\DeliveryApp;

class CallCenterController extends Controller
{

    public function getAllCallDelivery(Request $request)
    {
        $search = $request['search'] ?? "";
        $pageCount = $request['page'] ?? "10";
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $deliveries = DeliveryApp::with('pickup_time')->where('order_id', 'LIKE', "%$search%")
            ->orWhere('agent', 'LIKE', "%$search%")
            ->orWhere('status', 'LIKE', "%$search%")
            ->orWhere('vip_oplata', 'LIKE', "%$search%")
            ->orWhere('content', 'LIKE', "%$search%");

        if ($start_date) {
            $deliveries->where('order_date', '>=', $start_date);
        }
        if ($end_date) {
            $deliveries->where('order_date', '<=', $end_date);
        }
        if ($start_date && $end_date) {
            $deliveries->whereBetween('order_date', [$start_date, $end_date]);
        }
        if ($request->driver_id) {
            $deliveries->whereIn('driver_id', $request->driver_id);
        }
        if ($request->branch_id) {
            $deliveries->whereIn('branch_id', $request->branch_id);
        }
        if ($request->online) {
            $deliveries->orwhere('online', $request->online);
        }

        foreach ($deliveries as $delivery) {
            $branch = $delivery->branch;
            $branch_sale = $delivery->branch_sale;
            $files = $delivery->files;
            $user = $delivery->user;
            $car_model = $delivery->car_model;
            $config_time = $delivery->config_time;
            foreach ($delivery->pickup_time as $pickup) {
                if ($pickup->user) {
                    $pickup->user;
                } else {
                    $pickup->branch;
                }
            }
            $steps_four = $delivery->steps_four;
            $pickup_time = $delivery->pickup_time;
            $delivery_product = $delivery->delivery_product;
            $client = $delivery->delivery_client;
        }
        return BranchResource::collection($deliveries->paginate($pageCount));
    }
}
