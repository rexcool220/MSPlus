@section('page_heading','到貨管理')

@extends('admin.layouts.dashboard')

@section('section')
    <button type="button" id="new" class="btn btn-primary">New</button>
    <table class="table table-bordered" id="itemCategoryTable">
        <thead>
        <tr>
            <th>ItemID</th>
            <th>品項</th>
            <th>價格</th>
            <th>規格</th>
            <th>月份</th>
            <th>收單日期</th>
            <th>需求數量</th>
            <th>到貨數量</th>
            <th>成本</th>
            <th>批發價</th>
            <th>廠商</th>
            <th>到貨日期</th>
            <th>更新日期</th>
            <th>Photo</th>
            <th>Active</th>
            <th>修改</th>
            <th>刪除</th>
        </tr>
        </thead>
    </table>
    @include('datatables.itemCategoryForm')
@stop

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('#itemCategoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.itemCategory') !!}',
            columns: [
                {data: 'ItemID', name: 'ItemID'},
                {data: '品項', name: '品項'},
                {data: '價格', name: '價格'},
                {data: '規格', name: '規格'},
                {data: '月份', name: '月份'},
                {data: '收單日期', name: '收單日期'},
                {data: '需求數量', name: '需求數量'},
                {data: '到貨數量', name: '到貨數量'},
                {data: '成本', name: '成本'},
                {data: '批發價', name: '批發價'},
                {data: '廠商', name: '廠商'},
                {data: '到貨日期', name: '到貨日期'},
                {data: '更新時間', name: '更新時間'},
                {data: 'Photo', name: 'Photo'},
                {data: 'Active', name: 'Active'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        $('#itemCategoryTable').DataTable().on('click', '.btn-edit[data-remote]', function (e) {
            var itemCategoryJson = $(this).data('remote');
            $('#operate').val('edit');
            $('#ItemID').val(itemCategoryJson.ItemID);
            $('#品項').val(itemCategoryJson.品項);
            $('#價格').val(itemCategoryJson.價格);
            $('#規格').val(itemCategoryJson.規格);
            $('#月份').val(itemCategoryJson.月份);
            $('#收單日期').val(itemCategoryJson.收單日期);
            $('#需求數量').val(itemCategoryJson.需求數量);
            $('#到貨數量').val(itemCategoryJson.到貨數量);
            $('#成本').val(itemCategoryJson.成本);
            $('#批發價').val(itemCategoryJson.批發價);
            $('#廠商').val(itemCategoryJson.廠商);
            $('#到貨日期').val(itemCategoryJson.到貨日期);
            $('#更新時間').val(itemCategoryJson.更新時間);
            $('#Photo').val(itemCategoryJson.Photo);
            $('#Active').prop('checked', itemCategoryJson.Active);
            $('#itemCategoryModal').modal('show');
        });
        $('#itemCategoryTable').DataTable().on('click', '.btn-delete[data-remote]', function (e) {
            if (confirm('確認刪除？')) {
                var url = $(this).data('remote');
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true},
                    success: function (data) {
                        $('#itemCategoryTable').DataTable().draw(true);
                        alert("刪除完成");
                    }
                });
            }
        });
    });
    $('#submit').click(function () {
        var form = $("#itemCategoryForm");
        $.ajax({
            type: 'POST',
            url: 'editItemCategory',
            data: form.serialize(),
            success: function (data) {
                $('#itemCategoryTable').DataTable().draw(true);
                alert(data);
                $('#itemCategoryModal').modal('hide');
            },
            error: function (x, e) {
                if (x.status == 0) {
                    alert('You are offline!!\n Please Check Your Network.');
                } else if (x.status == 404) {
                    alert('Requested URL not found.');
                } else if (x.status == 500) {
                    alert('Internel Server Error.');
                } else if (e == 'parsererror') {
                    alert('Error.\nParsing JSON Request failed.');
                } else if (e == 'timeout') {
                    alert('Request Time out.');
                } else {
                    alert('Unknow Error.\n' + eval("'" + x.responseText + "'"));
                }
            }
        })
    });

    $('#new').click(function () {
        $('#operate').val('new');
        $('#itemCategoryForm').trigger("reset");
        $('#itemCategoryModal').modal('show');
    });

</script>
@endpush