<div id="shippingRecordModal" class="modal fade" aria-labelledby="shippingRecordModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">新增修改</h4>
            </div>
            <div class="modal-body" id="shippingRecordModalBody">
                <form id="shippingRecordForm" role="form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="operate" id="operate">
                    <div class="form-group">
                        <label for="FB帳號">FB帳號</label>
                        <input type="text" name="FB帳號" id="FB帳號" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="品項">品項</label>
                        <input type="text" name="品項" id="品項" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="單價">單價</label>
                        <input type="text" name="單價" id="單價" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="數量">數量</label>
                        <input type="text" name="數量" id="數量" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="匯款日期">匯款日期</label>
                        <input type="text" name="匯款日期" id="匯款日期" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="出貨日期">出貨日期</label>
                        <input type="text" name="出貨日期" id="出貨日期" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="SerialNumber">SerialNumber</label>
                        <input type="text" name="SerialNumber" id="SerialNumber" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="匯款編號">匯款編號</label>
                        <input type="text" name="匯款編號" id="匯款編號" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="確認收款" id="確認收款"/>確認收款</label>
                    </div>
                    <div class="form-group">
                        <label for="FBID">FBID</label>
                        <input type="text" name="FBID" id="FBID" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="備註">備註</label>
                        <input type="text" name="備註" id="備註" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="月份">月份</label>
                        <input type="text" name="月份" id="月份" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="規格">規格</label>
                        <input type="text" name="規格" id="規格" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="ItemID">ItemID</label>
                        <input type="text" name="ItemID" id="ItemID" class="form-control"/>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10"><button type="button" value="editShippingRecord" id="submit" class="btn btn-primary">確定</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>