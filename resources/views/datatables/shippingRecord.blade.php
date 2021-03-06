@section('page_heading','訂單管理')

@extends('admin.layouts.dashboard')

@section('section')
    <button type="button" id="new" class="btn btn-primary">New</button>
    <table class="table table-bordered" id="shippingRecordTable">
        <thead>
        <tr>
            <th>FB帳號</th>
            <th>品項</th>
            <th>單價</th>
            <th>數量</th>
            <th>匯款日期</th>
            <th>出貨日期</th>
            <th>SerialNumber</th>
            <th>匯款編號</th>
            <th>確認收款</th>
            <th>FBID</th>
            <th>備註</th>
            <th>月份</th>
            <th>規格</th>
            <th>ItemID</th>
            <th>修改</th>
            <th>刪除</th>
        </tr>
        </thead>
    </table>
    @include('datatables.shippingRecordForm')
@stop

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('#shippingRecordTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.shippingRecord') !!}',
            columns: [
                {data: 'FB帳號', name: 'FB帳號'},
                {data: '品項', name: '品項'},
                {data: '單價', name: '單價'},
                {data: '數量', name: '數量'},
                {data: '匯款日期', name: '匯款日期'},
                {data: '出貨日期', name: '出貨日期'},
                {data: 'SerialNumber', name: 'SerialNumber'},
                {data: '匯款編號', name: '匯款編號'},
                {data: '確認收款', name: '確認收款'},
                {data: 'FBID', name: 'FBID'},
                {data: '備註', name: '備註'},
                {data: '月份', name: '月份'},
                {data: '規格', name: '規格'},
                {data: 'ItemID', name: 'ItemID'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        $('#shippingRecordTable').DataTable().on('click', '.btn-edit[data-remote]', function (e) {
            var shippingRecordJson = $(this).data('remote');
            $('#operate').val('edit');
            $('#FB帳號').val(shippingRecordJson.FB帳號);
            $('#品項').val(shippingRecordJson.品項);
            $('#單價').val(shippingRecordJson.單價);
            $('#數量').val(shippingRecordJson.數量);
            $('#匯款日期').val(shippingRecordJson.匯款日期);
            $('#出貨日期').val(shippingRecordJson.出貨日期);
            $('#SerialNumber').val(shippingRecordJson.SerialNumber);
            $('#匯款編號').val(shippingRecordJson.匯款編號);
            $('#確認收款').prop('checked', shippingRecordJson.確認收款);
            $('#FBID').val(shippingRecordJson.FBID);
            $('#備註').val(shippingRecordJson.備註);
            $('#月份').val(shippingRecordJson.月份);
            $('#規格').val(shippingRecordJson.規格);
            $('#ItemID').val(shippingRecordJson.ItemID);
            $('#shippingRecordModal').modal('show');
        });
        $('#shippingRecordTable').DataTable().on('click', '.btn-delete[data-remote]', function (e) {
            if (confirm('確認刪除？')) {
                var url = $(this).data('remote');
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true},
                    success: function (data) {
                        $('#shippingRecordTable').DataTable().draw(true);
                        alert("刪除完成");
                    }
                });
            }
        });
    });
    $('#submit').click(function () {
        var form = $("#shippingRecordForm");
        $.ajax({
            type: 'POST',
            url: 'editShippingRecord',
            data: form.serialize(),
            success: function (data) {
                $('#shippingRecordTable').DataTable().draw(true);
                alert(data);
                $('#shippingRecordModal').modal('hide');
            },
            error: function (x, e) {
                if (x.status == 0) {
                    alert('You are offline!!\n Please Check Your Network.');
                } else if (x.status == 404) {
                    alert('Requested URL not found.');
                } else if (x.status == 500) {
                    alert(e.message);
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
        $('#shippingRecordForm').trigger("reset");
        $('#shippingRecordModal').modal('show');
    });
</script>
@endpush