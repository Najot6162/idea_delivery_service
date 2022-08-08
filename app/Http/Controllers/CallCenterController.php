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
        $deliveries = DeliveryApp::with(['pickup_time', 'branch', 'branch_sale', 'files', 'user', 'car_model', 'config_time', 'pickup_time.user', 'pickup_time.branch', 'delivery_product', 'client'])->where('order_id', 'LIKE', "%$search%")
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

        return BranchResource::collection($deliveries->paginate($pageCount));
    }
}
