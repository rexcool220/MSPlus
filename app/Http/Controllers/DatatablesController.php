<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShippingRecord;

use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
    public function getShippingRecord()
    {
        return view('datatables.shippingRecord');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function shippingRecordData()
    {
        return Datatables::of(ShippingRecord::query())->make(true);
    }
}
