@extends('company/base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-5">修改公司資料</h1>

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
        <form method="post" action="{{ route('company.update', $data->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">公司名稱:</label>
                <input type="text" class="form-control" name="company_name" value={{ $data->company_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">電話:</label>
                <input type="text" class="form-control" name="company_tel" value={{ $data->company_tel }} />
            </div>

            <div class="form-group">
                <label for="email">傳真:</label>
                <input type="text" class="form-control" name="company_fax" value={{ $data->company_fax }} />
            </div>
            <div class="form-group">
                <label for="city">地址:</label>
                <input type="text" class="form-control" name="company_address" value={{ $data->company_address }} />
            </div>
            <div class="form-group">
                <label for="country">統編:</label>
                <input type="text" class="form-control" name="company_tax_id_number" value={{ $data->company_tax_id_number }} />
            </div>
            <div class="form-group">
                <label for="job_title">簡介:</label>
                <textarea  class="form-control" name="company_brief" cols="50" rows="5">{{ $data->company_brief }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-success btn-md" href="{{URL::to('/')}}">回清單頁</a> 
        </form>
    </div>
</div>
@endsection