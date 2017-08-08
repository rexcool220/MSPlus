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
        $shippingRecord = ShippingRecord::select(['FB帳號', '品項', '單價', '數量', '匯款日期', '出貨日期', 'SerialNumber', '匯款編號', '確認收款', 'FBID', '備註', '月份', 'Active', '規格', 'ItemID']);

        return Datatables::of($shippingRecord)
            ->addColumn('action', function ($shippingRecord) {
                return '<button class="btn-delete" data-remote="/shippingRecord/'. $shippingRecord->SerialNumber .'">Delete</button>';
            })
            ->make(true);
    }
}
