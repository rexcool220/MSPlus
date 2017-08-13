<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function editShippingRecord()
    {
        $temp = request('ItemID');
        return $temp;
    }
    public function deleteShippingRecord($serialNumber)
    {
        $msg = $serialNumber;
        return response()->json(array('msg'=> $msg), 200);
    }
}
