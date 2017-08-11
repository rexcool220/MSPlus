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
            ->addIndexColumn()
            ->addColumn('edit', function ($shippingRecord) {
                $shippingRecordArray = array(
                    'FB帳號' => $shippingRecord->FB帳號,
                    '品項' => $shippingRecord->品項,
                    '單價' => $shippingRecord->單價,
                    '數量' => $shippingRecord->數量,
                    '匯款日期' => $shippingRecord->匯款日期,
                    '出貨日期' => $shippingRecord->出貨日期,
                    'SerialNumber' => $shippingRecord->SerialNumber,
                    '匯款編號' => $shippingRecord->匯款編號,
                    '確認收款' => $shippingRecord->確認收款,
                    'FBID' => $shippingRecord->FBID,
                    '備註' => $shippingRecord->備註,
                    '月份' => $shippingRecord->月份,
                    'Active' => $shippingRecord->Active,
                    '規格' => $shippingRecord->規格,
                    'ItemID' => $shippingRecord->ItemID
                );

                return '<button class="btn-edit btn-xs btn-primary" data-remote=\''. json_encode($shippingRecordArray) .'\'><span class="glyphicon glyphicon-edit"></span>&nbsp;</button>';
            })
            ->addColumn('delete', function ($shippingRecord) {
                return '<button class="btn-delete btn-xs btn-primary" data-remote="/shippingRecord/'. $shippingRecord->SerialNumber .'"><span class="glyphicon glyphicon-trash"></span>&nbsp;</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}
