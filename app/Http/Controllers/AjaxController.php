<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\ShippingRecord;

class AjaxController extends Controller
{
    public function editShippingRecord()
    {
        $fbAccount = request('FB帳號');
        $itemName = request('品項');
        $price = request('單價');
        $amount = request('數量');
        $remitDate = request('匯款日期');
        $shippingDate = request('出貨日期');
        $serialNumber = request('SerialNumber');
        $remitNumber = request('匯款編號');
        $isRemit = request('確認收款');
        $fbID = request('FBID');
        $comment = request('備註');
        $month = request('月份');
        $spec = request('規格');
        $itemID = request('ItemID');
        $result = DB::select("UPDATE ShippingRecord SET `FB帳號`=\"$fbAccount\",`品項`=\"$itemName\",`單價`=\"$price\",`數量`=\"$amount\",`匯款日期`=\"$remitDate\",`出貨日期`=\"$shippingDate\",`匯款編號`=\"$remitNumber\",`確認收款`=\"$isRemit\",`FBID`=\"$fbID\",`備註`=\"$comment\",`月份`=\"$month\",`規格`=\"$spec\",`ItemID`=\"$itemID\" WHERE `SerialNumber`=\"$serialNumber\"");
        return "修改完成";
    }

    public function deleteShippingRecord($serialNumber)
    {
        $result = ShippingRecord::WHERE('SerialNumber', $serialNumber)->delete();

        return $result;
    }
}
