<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>A Web Page</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <style type="text/css">
    .hr:last-child { display:none }
    form { display: contents}
    </style>  
</head>
<body>
  <div class="col-sm-12">
      @if(session()->get('success'))
          <div class="alert alert-success">
          {{ session()->get('success') }}  
          </div>
      @endif
  </div>      
  <div class="container-fluid" style="padding: 20pt;">
    <a class="btn btn-success btn-md" href="{{route('company.create')}}">+新增公司</a> 
    @foreach($data as $data)
      <div class="row">
        <div class="col-md-12">
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4">
                  {{$data->company_name}}
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12">
                      Tel: {{$data->company_tel}}
                    </div>
                    <div class="col-md-12">
                      FAX: {{$data->company_fax}}
                    </div>
                    <div class="col-md-12">
                      Adderess: {{$data->company_address}}
                    </div>
                    <div class="col-md-12">
                      統編: {{$data->company_tax_id_number}}
                    </div>
                    <div class="col-md-12">             
                      <dl>
                        <dt>簡述</dt>
                        <dd style="word-break: break-all;">{{$data->company_brief}}</dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12"> 
                    <a href="{{route('company.edit',$data->id)}}" class="btn btn-primary">修改</a> 
                    <form action="{{route('company.destroy', $data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">刪除</button>
                    </form>
                  </div>
              </div>
            </div>
            <div class="person_div col-md-6">
              <a class="btn btn-success" href="{{route('contact_person.create', 'cid='.$data->id)}}">＋新增聯絡人</a> 
              @if(!empty($data->persons) )
                @foreach ($data->persons as $contact_person)
                  <div style="height: 10pt;"></div>
                  <div class="row">
                    <div class="col-md-4"><img alt="預覽" src="{{URL::to('/')}}{{Config::get('cms.img_url')}}{{$contact_person->headshot}}" style="max-width: 110pt;"></div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-4">
                          <span style="display: block;">{{$contact_person->name}}</span> y
                          <span style="display: block;">{{$contact_person->tel}}</span> 
                          <span style="display: block;">{{$contact_person->mail}}</span>
                        </div>
                        <div class="col-md-8">
                          <dl>
                            <dt>簡述</dt>
                            <dd>{{$contact_person->brief}}</dd>
                          </dl>
                        </div> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin: 10pt 0 0 0">
                        <a href="{{route('contact_person.edit',$contact_person->id)}}" class="btn btn-primary">修改</a>
                        <form action="{{route('contact_person.destroy', $contact_person->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="cid" value="{{$contact_person->cid}}">
                            <button class="btn btn-danger" type="submit">刪除</button>
                        </form>                       
                    </div>
                  </div>
                  <div class="hr"><hr></div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
	<script src="js/jquery.min.js">
	</script>
</body>
</html>