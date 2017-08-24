<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\ShippingRecord;

use App\Members;

use App\RemitRecord;

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
        $operate = request('operate');
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
        if($operate == 'new')
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
        $operate = request('operate');
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

        if($operate == 'new')
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

    public function editItemCategory(Request $request)
    {
        $this->validate($request, [
            'ItemID' => 'required',
            '品項' => 'required',
            '價格' => 'required',
            '規格' => 'required',
            '月份' => 'required',
            '成本' => 'required',
            '批發價' => 'required',
        ]);
        $operate = request('operate');
        $itemID = request('ItemID');
        $itemName = request('品項');
        $price = request('價格');
        $spec = request('規格');
        $month = request('月份');
        $dueDate= request('收單日期');
        $requireAmount = request('需求數量');
        $arriveAmount = request('到貨數量');
        $cost = request('成本');
        $wholeSalePrice = request('批發價');
        $vendor = request('廠商');
        $arriveDate = request('到貨日期');
        $updateTime = request('更新時間');
        $photo = request('Photo');
        $active = request('Active') == true ? 1 : 0;

        if($operate == 'new')
        {
            ItemCategory::INSERT([
                'ItemID' => $itemID,
                '品項' => $itemName,
                '價格' => $price,
                '規格' => $spec,
                '月份' => $month,
                '收單日期' => $dueDate,
                '需求數量' => $requireAmount,
                '到貨數量' => $arriveAmount,
                '成本' => $cost,
                '批發價' => $wholeSalePrice,
                '廠商' => $vendor,
                '到貨日期' => $arriveDate,
                '更新時間' => $updateTime,
                'Photo' => $photo,
                'Active' => $active,
            ]);
            return "新增完成";
        }
        else {
            ItemCategory::WHERE('ItemID', $itemID)->WHERE('規格', $spec)->
            update([
                'ItemID' => $itemID,
                '品項' => $itemName,
                '價格' => $price,
                '規格' => $spec,
                '月份' => $month,
                '收單日期' => $dueDate,
                '需求數量' => $requireAmount,
                '到貨數量' => $arriveAmount,
                '成本' => $cost,
                '批發價' => $wholeSalePrice,
                '廠商' => $vendor,
                '到貨日期' => $arriveDate,
                '更新時間' => $updateTime,
                'Photo' => $photo,
                'Active' => $active,
            ]);
            return "修改完成";
        }
    }

    public function deleteItemCategory($itemID, $spec)
    {
        $result = DB::select("DELETE FROM ItemCategory WHERE ItemID = '$itemID' AND 規格 = '$spec'");
        return $result;
    }

    public function editRemitRecord(Request $request)
    {
        $this->validate($request, [
            '匯款編號' => 'required',
            '匯款末五碼' => 'required',
            '匯款日期' => 'required',
            '匯款金額' => 'required',
            'FB帳號' => 'required',
            '應匯款金額' => 'required',
            'FBID' => 'required',
            'PaidRebate' => 'required',
            '運費' => 'required',
        ]);
        $operate = request('operate');
        $remitNumber = request('匯款編號');
        $lastFiveCode = request('匯款末五碼');
        $remitDate = request('匯款日期');
        $memo = request('Memo');
        $isRemited = request('已收款') == true ? 1 : 0;
        $remitedAmount = request('匯款金額');
        $fbAccount = request('FB帳號');
        $remitAmount = request('應匯款金額');
        $isShipping = request('已出貨') == true ? 1 : 0;
        $adminMemo = request('管理員備註');
        $fbID = request('FBID');
        $paidRebate = request('PaidRebate');
        $shippingFee = request('運費');

        RemitRecord::WHERE('匯款編號', $remitNumber)->update([
            '匯款末五碼' => $lastFiveCode,
            '匯款日期' => $remitDate,
            'Memo' => $memo,
            '已收款' => $isRemited,
            '匯款金額' => $remitedAmount,
            'FB帳號' => $fbAccount,
            '應匯款金額' => $remitAmount,
            '已出貨' => $isShipping,
            '管理員備註' => $adminMemo,
            'FBID' => $fbID,
            'PaidRebate' => $paidRebate,
            '運費' => $shippingFee
        ]);
        return "修改完成";

    }

    public function deleteRemitRecord($remitNumber)
    {
        $result = RemitRecord::WHERE('匯款編號', $remitNumber)->delete();

        return $result;
    }

}
