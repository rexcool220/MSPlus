<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\ShippingRecord;

use App\Members;

class AjaxController extends Controller
{
    public function editShippingRecord(Request $request)
    {
        $this->validate($request, [
            'FB帳號' => 'required',
            '品項' => 'required',
            '單價' => 'required',
            '數量' => 'required',
            'FBID' => 'required',
            '月份' => 'required',
            '規格' => 'required',
            'ItemID' => 'required',
        ]);
        $fbAccount = request('FB帳號');
        $itemName = request('品項');
        $price = request('單價');
        $amount = request('數量');
        $remitDate = request('匯款日期');
        $shippingDate = request('出貨日期');
        $serialNumber = request('SerialNumber');
        $remitNumber = request('匯款編號');
        $isRemit = request('確認收款') == true ? 1 : 0;
        $fbID = request('FBID');
        $comment = request('備註');
        $month = request('月份');
        $spec = request('規格');
        $itemID = request('ItemID');
        if($serialNumber == '')
        {
            ShippingRecord::INSERT([
                'FB帳號' => $fbAccount,
                '品項' => $itemName,
                '單價' => $price,
                '數量' => $amount,
                '匯款日期' => $remitDate,
                '出貨日期' => $shippingDate,
                '匯款編號' => $remitNumber,
                '確認收款' => $isRemit,
                'FBID' => $fbID,
                '備註' => $comment,
                '月份' => $month,
                '規格' => $spec,
                'ItemID' => $itemID
            ]);
            return "新增完成";
        }
        else {
                ShippingRecord::WHERE('SerialNumber', $serialNumber)->update([
                'FB帳號' => $fbAccount,
                '品項' => $itemName,
                '單價' => $price,
                '數量' => $amount,
                '匯款日期' => $remitDate,
                '出貨日期' => $shippingDate,
                '匯款編號' => $remitNumber,
                '確認收款' => $isRemit,
                'FBID' => $fbID,
                '備註' => $comment,
                '月份' => $month,
                '規格' => $spec,
                'ItemID' => $itemID
            ]);
            return "修改完成";
        }
    }

    public function deleteShippingRecord($serialNumber)
    {
        $result = ShippingRecord::WHERE('SerialNumber', $serialNumber)->delete();

        return $result;
    }

    public function editMembers(Request $request)
    {
        $this->validate($request, [
            '姓名' => 'required',
            'FB帳號' => 'required',
            '郵遞區號地址' => 'required',
            '全家店到店服務代號' => 'required',
            '寄送方式' => 'required',
            '運費' => 'required',
            'FBID' => 'required',
            'Rebate' => 'required',
            'Type' => 'required',
        ]);
        $name = request('姓名');
        $fbAccount = request('FB帳號');
        $phoneNumber = request('手機號碼');
        $address = request('郵遞區號地址');
        $familyMartCode = request('全家店到店服務代號');
        $shippingWay = request('寄送方式');
        $shippingFee = request('運費');
        $comment = request('備註');
        $fbID = request('FBID');
        $rebate = request('Rebate');
        $type = request('Type');

        if($fbID == '')
        {
            Members::INSERT([
                '姓名' => $name,
                'FB帳號' => $fbAccount,
                '手機號碼' => $phoneNumber,
                '郵遞區號地址' => $address,
                '全家店到店服務代號' => $familyMartCode,
                '寄送方式' => $shippingWay,
                '運費' => $shippingFee,
                '備註' => $comment,
                'FBID' => $fbID,
                'Rebate' => $rebate,
                'Type' => $type
            ]);
            return "新增完成";
        }
        else {
            Members::WHERE('FBID', $fbID)->update([
                '姓名' => $name,
                'FB帳號' => $fbAccount,
                '手機號碼' => $phoneNumber,
                '郵遞區號地址' => $address,
                '全家店到店服務代號' => $familyMartCode,
                '寄送方式' => $shippingWay,
                '運費' => $shippingFee,
                '備註' => $comment,
                'Rebate' => $rebate,
                'Type' => $type
            ]);
            return "修改完成";
        }
    }

    public function deleteMembers($fbID)
    {
        $result = Members::WHERE('FBID', $fbID)->delete();

        return $result;
    }
}
