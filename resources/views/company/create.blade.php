@extends('company/base')
@section('main')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-5">新增公司資訊</h1>
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
      <form method="post" action="{{ route('company.store') }}">
          @csrf
          <div class="form-group">    
              <label for="company_name">公司名稱:</label>
              <input type="text" class="form-control" name="company_name"/>
          </div>

          <div class="form-group">
              <label for="company_tel">電話：</label>
              <input type="text" class="form-control" name="company_tel"/>
          </div>

          <div class="form-group">
              <label for="company_fax">傳真號碼:</label>
              <input type="text" class="form-control" name="company_fax"/>
          </div>
          <div class="form-group">
              <label for="company_address">地址:</label>
              <input type="text" class="form-control" name="company_address"/>
          </div>
          <div class="form-group">
              <label for="company_tax_id_number">統編:</label>
              <input type="text" class="form-control" name="company_tax_id_number"/>
          </div>
          <div class="form-group">
              <label for="company_brief">簡介:</label>
              <textarea  class="form-control" name="company_brief" cols="50" rows="5"></textarea>
          </div>                         
          <button type="submit" class="btn btn-success">新增</button>
          <a class="btn btn-success btn-md" href="{{URL::to('/')}}">回清單頁</a> 
          <a href="{{route('company.index')}}" class="btn btn-primary">編輯公司資訊</a>
      </form>
      
  </div>
</div>
</div>
@endsection