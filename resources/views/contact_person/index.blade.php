@extends('contact_person/base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h3 class="display-5">聯絡人資料</h3>
        <div style="margin: 0 0 15pt 0;">
            <a href="{{route('contact_person.create','cid='.$cid )}}" class="btn btn-primary">新增聯絡人資訊</a>
            <a class="btn btn-success btn-md" href="{{URL::to('/')}}">回清單頁</a> 
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                <td>姓名</td>
                <td>電話</td>
                <td>電子郵件</td>
                <td>簡介</td>
                <td>照片</td>
                <td colspan = 2>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data['contact_persons'] as $contact_person)
                <tr>
                    <td>{{$contact_person->name}}</td>
                    <td>{{$contact_person->tel}}</td>
                    <td>{{$contact_person->mail}}</td>
                    <td style="word-break: break-all;">{{$contact_person->brief}}</td>
                    <td><img src="{{URL::to('/')}}{{Config::get('cms.img_url')}}{{$contact_person->headshot}}" style="width: 180pt;" ></td>
                    <td>
                        <a href="{{ route('contact_person.edit',$contact_person->id)}}" class="btn btn-primary">修改</a>
                    </td>
                    <td>
                        <form action="{{ route('contact_person.destroy', $contact_person->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="cid" value="{{$contact_person->cid}}">
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