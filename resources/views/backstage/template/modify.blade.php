@extends('web_global/base')
@section('main')

<section>
    <div class="card">
        <div class="card-header">
            <p class="card-title float-left card-title-p "><i class="ti-pencil-alt"></i>修改 功能名稱</p>
            <div class="float-right"><a class="btn btn-light"><span class="ti-menu-alt"></span>回清單頁面</a></div>
        </div>
        <!-- 修改表格 -->
        <form action="" name="">
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">文字欄位</label>
                        <input name="" type="text" class="form-control" placeholder="Name">
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">密碼欄位</label>
                        <input type="password" name="" class="form-control" placeholder="New Password" autocomplete="off">
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">文字框欄位</label>
                        <textarea class="form-control" name=""></textarea>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">下拉選單欄位</label>
                        <select class="form-control" name="">
                            <?php for ($i=0; $i < 5; $i++) { ?>
                            <option value="">選項<?=$i;?></option>
                            <?php } ?>
                        </select>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">單選欄位</label>
                        <p>hannie 沒寫</p>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">多選欄位</label>
                        <p>hannie 沒寫</p>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">顏色欄位</label>
                        <div id="cp2" class="input-group colorpicker-component">
                            <input type="text" value="#00AABB" class="form-control" />
                            <span class="input-group-addon"><i id="color-i"></i></span>
                        </div>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label" for="my-element">日期</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" data-language='en' id="check_in_date" placeholder="start"/>
                            <span class="input-group-text input-group-prepend input-group-addon right_addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </span>
                        </div>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label" for="my-element">日期</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" data-language='en' id="check_out_date" placeholder="end"/>
                            <span class="input-group-text input-group-prepend input-group-addon right_addon">
                                <i class="fa fa-fw ti-calendar"></i>
                            </span>
                        </div>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="control-label">時間</label>
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" value="Now" placeholder="HH:MM">
                            <span class="input-group-addon right_addon">
                                <span class="fa fa-clock-o"></span>
                            </span>
                        </div>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                    <div class="col-12">
                        <label class="control-label">編輯器欄位</label>
                        <textarea name="" class="jq_ckeditor"></textarea>
                        <small class="form-text text-danger">欄位註解</small>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center flex-wrap">
                <button class="btn btn-light m-1"><span class="ti-receipt"></span>回清單頁面</button>
                <button class="btn btn-success m-1"><span class="ti-save-alt"></span>儲存資料</button>
                <button class="btn btn-danger m-1"><span class="ti-trash"></span>刪除資料</button>
                <button class="btn btn-primary m-1"><span class="ti-file"></span>儲存為新資料</button>
                <input type="text" class="form-control mr-1 p-2 sm-input text-center" placeholder="1" name="">
                <button class="btn btn-primary"><span class="ti-files"></span>儲存並新增多筆資料</button>
            </div>
        </form>
    </div>
</section>

@endsection

@section('page_js')
    <script type="text/javascript" charset="utf-8">
        $(function(){
            var editors = {}
            $('.jq_ckeditor').each(function(i, el) {
                editors[i] = CKEDITOR.replace(el);
                CKFinder.setupCKEditor( editors[i], null, { type: 'Files' } );
            });
        });  
    </script>
@endsection