@extends('web_global/base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h3 class="display-5">聯絡人資料</h3>
        <div style="margin: 0 0 15pt 0;">
            <a href="{{route('commodity.create')}}" class="btn btn-primary">新增聯絡人資訊</a>
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                <td>照片</td>
                <td colspan = 2>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($commoditys as $commodity)
                <tr>
                    <td><img src="{{ asset('storage/'.$commodity->file_name)}}" style="width: 180pt;" ></td>
                    <td>
                        <a href="{{ route('commodity.edit',$commodity->id)}}" class="btn btn-primary">修改</a>
                    </td>
                    <td>
                        <form action="{{ route('commodity.destroy', $commodity->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$commodity->id}}">
                        <button class="btn btn-danger" type="submit">刪除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div>
@endsection

<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
</div>