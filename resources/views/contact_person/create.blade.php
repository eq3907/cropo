@extends('contact_person/base')
@section('main')

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">


</script>

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">新增聯絡人資訊</h1>
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
      <form method="post" action="{{ route('contact_person.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">姓名:</label>
              <input type="hidden" name="cid" value="{{$cid}}">
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="tel">電話:</label>
              <input type="text" class="form-control" name="tel"/>
          </div>
          <div class="form-group">
              <label for="mail">電子郵件:</label>
              <input type="text" class="form-control" name="mail"/>
          </div>
          <div class="form-group">
              <label for="brief">簡介:</label>
              <textarea  class="form-control" name="brief" cols="50" rows="5"></textarea>
          </div>
          <div class="form-group">
              <input type="hidden" id="x" name="x" />
			        <input type="hidden" id="y" name="y" />
			        <input type="hidden" id="w" name="w" />
			        <input type="hidden" id="h" name="h" />          
              <img src="" id="image_holder" style="width='240' height='240'">
          </div>
          <div class="form-group">
              <!-- <label for="headshot">照片:</label> -->
              <!-- <input type="text" class="form-control" name="headshot"/> -->
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">上傳照片</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="headshot" multiple="multiple">
                  <label class="custom-file-label">請選擇檔案</label>
                </div>
              </div>

          </div>
          <button type="submit" class="btn btn-success">新增</button>
          <a class="btn btn-success btn-md" href="{{URL::to('/')}}">回清單頁</a> 
          <a href="{{route('contact_person.index','cid='.$cid)}}" class="btn btn-primary">編輯聯絡資訊</a>
      </form>
      
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    
    

    $(".custom-file-input").change(function(e){

        var fileName = $(this).val().split("\\").pop();
        var reader = new FileReader();
        
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        reader.onload = function (event) {
            $("#image_holder").attr("src", event.target.result);
            var jcrop_api = $.Jcrop('#image_holder');
            jcrop_api.release();
            jcrop_api.destroy();
            $(".jcrop-holder").remove();
            $('#image_holder').Jcrop({
                aspectRatio: 1,
                onSelect: updateCoords
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

</script>

@endsection