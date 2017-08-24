@section('page_heading','會員管理')

@extends('admin.layouts.dashboard')

@section('section')
    <button type="button" id="new" class="btn btn-primary">New</button>
    <table class="table table-bordered" id="membersTable">
        <thead>
        <tr>
            <th>姓名</th>
            <th>FB帳號</th>
            <th>手機號碼</th>
            <th>郵遞區號地址</th>
            <th>全家店到店服務代號</th>
            <th>寄送方式</th>
            <th>運費</th>
            <th>備註</th>
            <th>FBID</th>
            <th>Rebate</th>
            <th>Type</th>
            <th>修改</th>
            <th>刪除</th>
        </tr>
        </thead>
    </table>
    @include('datatables.membersForm')
@stop

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('#membersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.members') !!}',
            columns: [
                {data: '姓名', name: '姓名'},
                {data: 'FB帳號', name: 'FB帳號'},
                {data: '手機號碼', name: '手機號碼'},
                {data: '郵遞區號地址', name: '郵遞區號地址'},
                {data: '全家店到店服務代號', name: '全家店到店服務代號'},
                {data: '寄送方式', name: '寄送方式'},
                {data: '運費', name: '運費'},
                {data: '備註', name: '備註'},
                {data: 'FBID', name: 'FBID'},
                {data: 'Rebate', name: 'Rebate'},
                {data: 'Type', name: 'Type'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        $('#membersTable').DataTable().on('click', '.btn-edit[data-remote]', function (e) {
            var membersJson = $(this).data('remote');
            $('#operate').val('edit');
            $('#姓名').val(membersJson.姓名);
            $('#FB帳號').val(membersJson.FB帳號);
            $('#手機號碼').val(membersJson.手機號碼);
            $('#郵遞區號地址').val(membersJson.郵遞區號地址);
            $('#全家店到店服務代號').val(membersJson.全家店到店服務代號);
            $('#寄送方式').val(membersJson.寄送方式);
            $('#運費').val(membersJson.運費);
            $('#備註').val(membersJson.備註);
            $('#FBID').val(membersJson.FBID);
            $('#Rebate').val(membersJson.Rebate);
            $('#Type').val(membersJson.Type);
            $('#membersModal').modal('show');
        });
        $('#membersTable').DataTable().on('click', '.btn-delete[data-remote]', function (e) {
            if (confirm('確認刪除？')) {
                var url = $(this).data('remote');
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true},
                    success: function (data) {
                        $('#membersTable').DataTable().draw(true);
                        alert("刪除完成");
                    }
                });
            }
        });
    });
    $('#submit').click(function () {
        var form = $("#membersForm");
        $.ajax({
            type: 'POST',
            url: 'editMembers',
            data: form.serialize(),
            success: function (data) {
                $('#membersTable').DataTable().draw(true);
                alert(data);
                $('#membersModal').modal('hide');
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
        $('#membersForm').trigger("reset");
        $('#membersModal').modal('show');
    });
</script>
@endpush