@extends('web_global/base')
@section('main')
    <form name="" action="" method="post" enctype="multipart/form-data" onsubmit="">
        <section>
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title"><i class="ti-search"></i> 搜尋 功能名稱</h3>
                    <span class="float-right"><i class="ti-angle-up clickable"></i></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label class="control-label">文字搜尋欄位</label>
                            <input name="" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="control-label">多選搜尋欄位</label>
                            <div>  
                                <?php for($i=1;$i<=20;$i++){ ?>
                                <label class="mr-2"><input name="" type="checkbox" class="square-blue"> 多選搜尋<?=$i;?> </label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-primary mr-2"><span class="ti-server"></span>開始搜尋</button>
                        <button class="btn btn-default mr-2"><span class="ti-na"></span>清除搜尋</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <section class="card">
        <div class="card-header d-flex justify-content-between flex-wrap">
            <p class="card-title card-title-p">
                <i class="ti-menu-alt"></i> 功能資料清單 - 每頁顯示
                <select name="">
                    <?php for($i=10;$i<=50;$i+=10){ ?>
                    <option value="<?=$i;?>"><?=$i;?></option>
                    <?php } ?>
                    <option value="5">ALL</option>
                </select> 筆
            </p>
            <ul class="d-flex flex-wrap resize-ul">
                <?php for($i=1;$i<=5;$i++){ ?>
                <li><a class="btn btn-light"><span class="ti-export text-primary"></span>功能/批次處理</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="card-body">
            <form name="" action="" method="post" enctype="multipart/form-data" onsubmit="">
                <div class="table-responsive">
                    <table class="table horizontal_table table-striped table-hover display" id="example">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Extn.</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>編輯 / 刪除 / 瀏覽</th>
                            </tr>
                        </thead>
                    </table>
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