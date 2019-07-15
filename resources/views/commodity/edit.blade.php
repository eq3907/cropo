@extends('commodity/base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-5">修改聯絡人資料</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{route('commodity.update', $data->id)}}" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <img id="image_holder" src="{{URL::to('/')}}{{Config::get('cms.img_url')}}{{$data->path}}" style="max-width: 110pt;">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">上傳照片</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="headshot">
                        <label class="custom-file-label">請選擇檔案</label>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-success btn-md" href="{{URL::to('/')}}">回清單頁</a> 
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $(".custom-file-input").change(function(){
        var fileName = $(this).val().split("\\").pop();
        var reader = new FileReader();
        
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        reader.onload = function (event) {
          $("#image_holder").attr("src", event.target.result) ;
        }

        if(this.files[0])
            reader.readAsDataURL(this.files[0]);
        else
            $("#image_holder").attr("src","{{URL::to('/')}}{{Config::get('cms.img_url')}}{{$data->path}}");        

      });
    });
</script>
@endsection