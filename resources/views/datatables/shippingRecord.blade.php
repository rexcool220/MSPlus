@section('page_heading','訂單管理')

@extends('admin.layouts.dashboard')

@section('section')
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
            <th></th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
    $(function() {
        $('#shippingRecordTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.shippingRecord') !!}',
            columns: [
                { data: 'FB帳號', name: 'FB帳號' },
                { data: '品項', name: '品項' },
                { data: '單價', name: '單價' },
                { data: '數量', name: '數量' },
                { data: '匯款日期', name: '匯款日期' },
                { data: '出貨日期', name: '出貨日期' },
                { data: 'SerialNumber', name: 'SerialNumber' },
                { data: '匯款編號', name: '匯款編號' },
                { data: '確認收款', name: '確認收款' },
                { data: 'FBID', name: 'FBID' },
                { data: '備註', name: '備註' },
                { data: '月份', name: '月份' },
                { data: '規格', name: '規格' },
                { data: 'ItemID', name: 'ItemID' },
                { data: 'action', name: 'action' }
            ]
        });
        $('#shippingRecordTable').DataTable().on('click', '.btn-delete[data-remote]', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).data('remote');
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {method: '_DELETE', submit: true}
            }).always(function (data) {
                $('#shippingRecordTable').DataTable().draw(false);
                alert(data.msg);
            });
        });

    });

</script>
@endpush