<div id="remitRecordModal" class="modal fade" aria-labelledby="remitRecordModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">修改</h4>
            </div>
            <div class="modal-body" id="remitRecordModalBody">
                <form id="remitRecordForm" role="form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="operate" id="operate">
                    <div class="form-group">
                        <label for="已收款">已收款</label>
                        <input type="text" name="已收款" id="已收款" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="管理員備註">管理員備註</label>
                        <input type="text" name="管理員備註" id="管理員備註" class="form-control"/>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10"><button type="button" value="editremitRecord" id="submit" class="btn btn-primary">確定</button></div>
                    </div>
                    <div class="form-group">
                        <label for="匯款編號">匯款編號</label>
                        <input type="text" name="匯款編號" id="匯款編號" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="匯款末五碼">匯款末五碼</label>
                        <input type="text" name="匯款末五碼" id="匯款末五碼" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="匯款日期">匯款日期</label>
                        <input type="text" name="匯款日期" id="匯款日期" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="Memo">Memo</label>
                        <input type="text" name="Memo" id="Memo" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="匯款金額">匯款金額</label>
                        <input type="text" name="匯款金額" id="匯款金額" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="FB帳號">FB帳號</label>
                        <input type="text" name="FB帳號" id="FB帳號" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="應匯款金額">應匯款金額</label>
                        <input type="text" name="應匯款金額" id="應匯款金額" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="已出貨">應匯款金額</label>
                        <input type="text" name="已出貨" id="已出貨" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="FBID">FBID</label>
                        <input type="text" name="FBID" id="FBID" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="PaidRebate">PaidRebate</label>
                        <input type="text" name="PaidRebate" id="PaidRebate" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="運費">運費</label>
                        <input type="text" name="運費" id="運費" class="form-control" readonly/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>