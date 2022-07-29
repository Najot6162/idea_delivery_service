<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ConfigTime;
use Illuminate\Support\Carbon;
use App\Models\DeliveryApp;


class chekTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chekTime:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'chekTime Every Minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deliveries = DeliveryApp::whereNotIn('status', ['4', '5', '6', '7', '8'])->get();
        $config_time = ConfigTime::where('active', '1')->first();
        $time = $config_time->time;
        $time1 = $time / 3;
        $time2 = $time1 * 2;

        foreach ($deliveries as $delivery) {
            // $start_date = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $delivery->order_date);
            $start_date = $delivery->order_date;
            $current_date = Carbon::now()->toDateTimeString();
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $current_date);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $start_date);
            $diff_in_hours = $to->diffInHours($from);
            if ($time1 >= $diff_in_hours) {
                $delivery->status_time = 1;
            }
            if ($time2 >= $diff_in_hours) {
                $delivery->status_time = 2;
            }
            if ($time >= $diff_in_hours) {
                $delivery->status_time = 3;
            } else {
                $delivery->status_time = 4;
            }

            if ($delivery->save()) {
                echo "status time updated";
            };
        }
        return 0;
    }
}
