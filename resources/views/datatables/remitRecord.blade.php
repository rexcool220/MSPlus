@section('page_heading','匯款管理')

@extends('admin.layouts.dashboard')

@section('section')
    <table class="table table-bordered" id="remitRecordTable">
        <thead>
        <tr>
            <th>匯款編號</th>
            <th>匯款末五碼</th>
            <th>匯款日期</th>
            <th>匯款金額</th>
            <th>FB帳號</th>
            <th>應匯款金額</th>
            <th>已出貨</th>
            <th>FBID</th>
            <th>PaidRebate</th>
            <th>運費</th>
            <th>Memo</th>
            <th>管理員備註</th>
            <th>已收款</th>
            <th>修改</th>
            <th>刪除</th>
        </tr>
        </thead>
    </table>
    @include('datatables.remitRecordForm')
@stop

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('#remitRecordTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.remitRecord') !!}',
            columns: [
                {data: '匯款編號', name: '匯款編號'},
                {data: '匯款末五碼', name: '匯款末五碼'},
                {data: '匯款日期', name: '匯款日期'},
                {data: '匯款金額', name: '匯款金額'},
                {data: 'FB帳號', name: 'FB帳號'},
                {data: '應匯款金額', name: '應匯款金額'},
                {data: '已出貨', name: '已出貨'},
                {data: 'FBID', name: 'FBID'},
                {data: 'PaidRebate', name: 'PaidRebate'},
                {data: '運費', name: '運費'},
                {data: 'Memo', name: 'Memo'},
                {data: '管理員備註', name: '管理員備註'},
                {data: '已收款', name: '已收款'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        $('#remitRecordTable').DataTable().on('click', '.btn-edit[data-remote]', function (e) {
            var remitRecordJson = $(this).data('remote');
            $('#operate').val('edit');
            $('#匯款編號').val(remitRecordJson.匯款編號);
            $('#匯款末五碼').val(remitRecordJson.匯款末五碼);
            $('#匯款日期').val(remitRecordJson.匯款日期);
            $('#Memo').val(remitRecordJson.Memo);
            $('#已收款').prop('checked', remitRecordJson.已收款);
            $('#匯款金額').val(remitRecordJson.匯款金額);
            $('#FB帳號').val(remitRecordJson.FB帳號);
            $('#應匯款金額').val(remitRecordJson.應匯款金額);
            $('#已出貨').prop('checked', remitRecordJson.已出貨);
            $('#管理員備註').val(remitRecordJson.管理員備註);
            $('#FBID').val(remitRecordJson.FBID);
            $('#PaidRebate').val(remitRecordJson.PaidRebate);
            $('#運費').val(remitRecordJson.運費);
            $('#remitRecordModal').modal('show');
        });
        $('#remitRecordTable').DataTable().on('click', '.btn-delete[data-remote]', function (e) {
            if (confirm('確認刪除？')) {
                var url = $(this).data('remote');
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true},
                    success: function (data) {
                        $('#remitRecordTable').DataTable().draw(true);
                        alert("刪除完成");
                    }
                });
            }
        });
    });
    $('#submit').click(function () {
        var form = $("#remitRecordForm");
        $.ajax({
            type: 'POST',
            url: 'editRemitRecord',
            data: form.serialize(),
            success: function (data) {
                $('#remitRecordTable').DataTable().draw(true);
                alert(data);
                $('#remitRecordModal').modal('hide');
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
</script>
@endpush