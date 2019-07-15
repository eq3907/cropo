@extends('company/base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h3 class="display-5">公司資料</h3>
        <div style="margin: 0 0 15pt 0;">
            <a href="{{route('company.create')}}" class="btn btn-primary">新增公司資訊</a>
            <a class="btn btn-success btn-md" href="{{URL::to('/')}}">回清單頁</a> 
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Tel</td>
                <td>Fax</td>
                <td>Address</td>
                <td>Tax ID Number</td>
                <td>Brief</td>
                <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($companys as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->company_name}}</td>
                    <td>{{$company->company_tel}}</td>
                    <td>{{$company->company_fax}}</td>
                    <td>{{$company->company_address}}</td>
                    <td>{{$company->company_tax_id_number}}</td>
                    <td style="word-break: break-all;">{{$company->company_brief}}</td>
                    <td>
                        <a href="{{ route('company.edit',$company->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('company.destroy', $company->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
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