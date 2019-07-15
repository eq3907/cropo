@extends('commodity/base')
@section('main')

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">


</script>

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">新增商品</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('commodity.store') }}" enctype="multipart/form-data">
          @csrf
          <meta name="csrf-token" content="{{csrf_token()}}">
          <div class="form-group">
              <input type="hidden" id="x" name="x" />
			        <input type="hidden" id="y" name="y" />
			        <input type="hidden" id="w" name="w" />
			        <input type="hidden" id="h" name="h" />
              <img src="" id="image_holder">
          </div>
          <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">上傳照片</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="headshot" id="file_upload" multiple="multiple">
                  <label class="custom-file-label">請選擇檔案</label>
                </div>
              </div>

          </div>
          <button type="submit" class="btn btn-success">新增</button>
          <a class="btn btn-success btn-md" href="{{URL::to('/commoditypo')}}">回清單頁</a> 
      </form>
      
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    /*
    $("#file_upload").change(function () {
            uploadImage();
        })
    

    function uploadImage() {  //判斷是否有選擇上傳文件
        var imgPath = $("#file_upload").val();
        if (imgPath == "") {
            alert("請選擇上傳圖片！");
            return;
        }
        //判斷上傳文件的後綴名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("請選擇圖片文件");
            return;
        }

        var formData = new FormData();
        formData.append('fileupload',$('#file_upload')[0].files[0]);
        console.log(formData);
        $.ajax({
            type: "POST",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('upload.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#art_thumb').attr('src', data);
                $("input[name='map']").val(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上傳失敗，請檢查網絡後重試");
            }
        });
    }
    */

    $(".custom-file-input").change(function(e){

        var fileName = $(this).val().split("\\").pop();
        var reader = new FileReader();

        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        reader.onload = function (e) {
          $("#image_holder").attr("src", e.target.result);
          //var $img = $("#image_holder");
          var jcrop_api = $.Jcrop('#image_holder');

          
          jcrop_api.tellSelect();
          console.log(jcrop_api.tellScaled());
          jcrop_api.release();
          jcrop_api.destroy();
          $("#image_holder").removeClass();
          $(".jcrop-holder").remove();
          $('#image_holder').Jcrop({
              onSelect: updateCoords,
              aspectRatio: 3/2,
              //minSize: [1024],
              bgColor:'black',
              allowResize: false
            },function(){
              jcrop_api = this;
          });
        }
        
        if(this.files[0]){
          reader.readAsDataURL(this.files[0]);
          //$("#image_holder").show();
        }else{
          $("#image_holder").attr("src",'');
          //$("#image_holder").hide();
        }
    });
    

  });
 
  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  }

  function getRandom() {
    var dim = jcrop_api.getBounds();
    return [
      Math.round(Math.random() * dim[0]),
      Math.round(Math.random() * dim[1]),
      Math.round(Math.random() * dim[0]),
      Math.round(Math.random() * dim[1])
    ];
  };    

</script>

@endsection