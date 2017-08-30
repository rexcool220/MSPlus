<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function ChartData()
    {
        $revenues = DB::select('SELECT SUM(ShippingRecord.單價 * ShippingRecord.數量) AS revenue, SUM((ShippingRecord.單價 - ItemCategory.成本) * ShippingRecord.數量) AS profit, ShippingRecord.月份 AS month FROM ShippingRecord,ItemCategory WHERE(ShippingRecord.ItemID = ItemCategory.ItemID AND ShippingRecord.規格 = ItemCategory.規格) AND ShippingRecord.月份 REGEXP \'^2017[0-1][0-9]\' AND ShippingRecord.月份 > 201704 GROUP BY ShippingRecord.月份');

        return view('admin.dashboard',compact('revenues'));
    }
}
