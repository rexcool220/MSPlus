<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShippingRecord;

use App\Members;

use App\ItemCategory;

use App\RemitRecord;

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

                return '<button class="btn-edit btn-warning" data-remote=\''. htmlspecialchars(json_encode($shippingRecordArray), ENT_QUOTES, 'UTF-8') .'\'>Edit</button>';
            })
            ->addColumn('delete', function ($shippingRecord) {
                return '<button class="btn-delete btn-danger" data-remote="/shippingRecord/'. $shippingRecord->SerialNumber .'">Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }

    public function getMembers()
    {
        return view('datatables.members');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function membersData()
    {
        $members = Members::select(['姓名', 'FB帳號', '手機號碼', '郵遞區號地址', '全家店到店服務代號', '寄送方式', '運費', '備註', 'FBID', 'Rebate', 'Type']);
        return Datatables::of($members)
            ->addIndexColumn()
            ->addColumn('edit', function ($members) {
                $membersArray = array(
                    '姓名' => $members->姓名,
                    'FB帳號' => $members->FB帳號,
                    '手機號碼' => $members->手機號碼,
                    '郵遞區號地址' => $members->郵遞區號地址,
                    '全家店到店服務代號' => $members->全家店到店服務代號,
                    '寄送方式' => $members->寄送方式,
                    '運費' => $members->運費,
                    '備註' => $members->備註,
                    'FBID' => $members->FBID,
                    'Rebate' => $members->Rebate,
                    'Type' => $members->Type
                );

                return '<button class="btn-edit btn-warning" data-remote=\''. htmlspecialchars(json_encode($membersArray), ENT_QUOTES, 'UTF-8') .'\'>Edit</button>';
            })
            ->addColumn('delete', function ($members) {
                return '<button class="btn-delete btn-danger" data-remote="/members/'. $members->FBID .'">Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
    public function getItemCategory()
    {
        return view('datatables.itemCategory');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function itemCategoryData()
    {
        $itemCategory = ItemCategory::select(['ItemID', '品項', '價格', '規格', '月份', '收單日期', '需求數量', '到貨數量', '成本', '批發價', '廠商', '到貨日期', '更新時間', 'Photo', 'Active']);

        return Datatables::of($itemCategory)
            ->addIndexColumn()
            ->addColumn('edit', function ($itemCategory) {
                $itemCategoryArray = array(
                    'ItemID' => $itemCategory->ItemID,
                    '品項' => $itemCategory->品項,
                    '價格' => $itemCategory->價格,
                    '規格' => $itemCategory->規格,
                    '月份' => $itemCategory->月份,
                    '收單日期' => $itemCategory->收單日期,
                    '需求數量' => $itemCategory->需求數量,
                    '到貨數量' => $itemCategory->到貨數量,
                    '成本' => $itemCategory->成本,
                    '批發價' => $itemCategory->批發價,
                    '廠商' => $itemCategory->廠商,
                    '到貨日期' => $itemCategory->到貨日期,
                    '更新時間' => $itemCategory->更新時間,
                    'Photo' => $itemCategory->Photo,
                    'Active' => $itemCategory->Active
                );

                return '<button class="btn-edit btn-warning" data-remote=\''. htmlspecialchars(json_encode($itemCategoryArray), ENT_QUOTES, 'UTF-8') .'\'>Edit</button>';
            })
            ->addColumn('delete', function ($itemCategory) {
                return '<button class="btn-delete btn-danger" data-remote="/itemCategory/'. $itemCategory->ItemID . '/' . $itemCategory->規格 . '">Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
    public function getRemitRecord()
    {
        return view('datatables.remitRecord');
    }

    public function remitRecordData()
    {
        $remitRecord = RemitRecord::select(['匯款編號', '匯款末五碼', '匯款日期', 'Memo', '已收款'
            , '匯款金額', 'FB帳號', '應匯款金額', '已出貨', '管理員備註', 'FBID', 'PaidRebate', '運費']);
        return Datatables::of($remitRecord)
            ->addIndexColumn()
            ->addColumn('edit', function ($remitRecord) {
                $remitRecordArray = array(
                    '匯款編號' => $remitRecord->匯款編號,
                    '匯款末五碼' => $remitRecord->匯款末五碼,
                    '匯款日期' => $remitRecord->匯款日期,
                    'Memo' => $remitRecord->Memo,
                    '已收款' => $remitRecord->已收款,
                    '匯款金額' => $remitRecord->匯款金額,
                    'FB帳號' => $remitRecord->FB帳號,
                    '應匯款金額' => $remitRecord->應匯款金額,
                    '已出貨' => $remitRecord->已出貨,
                    '管理員備註' => $remitRecord->管理員備註,
                    'FBID' => $remitRecord->FBID,
                    'PaidRebate' => $remitRecord->PaidRebate,
                    '運費' => $remitRecord->運費
                );

                return '<button class="btn-edit btn-warning" data-remote=\''. htmlspecialchars(json_encode($remitRecordArray), ENT_QUOTES, 'UTF-8') .'\'>Edit</button>';
            })
            ->addColumn('delete', function ($remitRecord) {
                return '<button class="btn-delete btn-danger" data-remote="/remitRecord/'. $remitRecord->匯款編號 .'">Delete</button>';
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }
}
