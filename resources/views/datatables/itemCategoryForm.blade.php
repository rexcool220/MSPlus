<div id="itemCategoryModal" class="modal fade" aria-labelledby="shippingRecordModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">新增修改</h4>
            </div>
            <div class="modal-body" id="itemCategoryModalBody">
                <form id="itemCategoryForm" role="form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="operate" id="operate">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10"><button type="button" value="editItemCategory" id="submit" class="btn btn-primary">確定</button></div>
                    </div>
                    <div class="form-group">
                        <label for="Active">Active</label>
                        <input type="text" name="Active" id="Active" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="ItemID">ItemID</label>
                        <input type="text" name="ItemID" id="ItemID" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="品項">品項</label>
                        <input type="text" name="品項" id="品項" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="價格">價格</label>
                        <input type="text" name="價格" id="價格" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="規格">規格</label>
                        <input type="text" name="規格" id="規格" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="月份">月份</label>
                        <input type="text" name="月份" id="月份" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="收單日期">收單日期</label>
                        <input type="text" name="收單日期" id="收單日期" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="需求數量">需求數量</label>
                        <input type="text" name="需求數量" id="需求數量" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="到貨數量">到貨數量</label>
                        <input type="text" name="到貨數量" id="到貨數量" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="成本">成本</label>
                        <input type="text" name="成本" id="成本" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="批發價">批發價</label>
                        <input type="text" name="批發價" id="批發價" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="廠商">廠商</label>
                        <input type="text" name="廠商" id="廠商" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="到貨日期">到貨日期</label>
                        <input type="text" name="到貨日期" id="到貨日期" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="更新時間">更新時間</label>
                        <input type="text" name="更新時間" id="更新時間" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="Photo">Photo</label>
                        <input type="text" name="Photo" id="Photo" class="form-control"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>