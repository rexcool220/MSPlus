<div id="membersModal" class="modal fade" aria-labelledby="shippingRecordModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">新增修改</h4>
            </div>
            <div class="modal-body" id="membersModalBody">
                <form id="membersForm" role="form" >
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10"><button type="button" value="editmembers" id="submit" class="btn btn-primary">確定</button></div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="姓名">姓名</label>
                        <input type="text" name="姓名" id="姓名" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="FB帳號">FB帳號</label>
                        <input type="text" name="FB帳號" id="FB帳號" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="手機號碼">手機號碼</label>
                        <input type="text" name="手機號碼" id="手機號碼" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="郵遞區號地址">郵遞區號地址</label>
                        <input type="text" name="郵遞區號地址" id="郵遞區號地址" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="全家店到店服務代號">全家店到店服務代號</全家店到店服務代號></label>
                        <input type="text" name="全家店到店服務代號" id="全家店到店服務代號" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="寄送方式">寄送方式</label>
                        <input type="text" name="寄送方式" id="寄送方式" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="運費">運費</label>
                        <input type="text" name="運費" id="運費" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="備註">備註</label>
                        <input type="text" name="備註" id="備註" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="FBID">FBID</label>
                        <input type="text" name="FBID" id="FBID" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="Rebate">Rebate</label>
                        <input type="text" name="Rebate" id="Rebate" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <input type="text" name="Type" id="Type" class="form-control"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>