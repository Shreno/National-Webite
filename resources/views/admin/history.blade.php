@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">History</li>
      </ol>

    <!-- Page Content -->
    @if(count($errors)>0)
    <br>
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('m'))
      <?php $a=[]; $a=session()->pull('m'); ?>
      <div class="alert alert-{{$a[0]}}" style="width: 40%">
        {{$a[1]}}
      </div>
    @endif
    <!--success message in all views-->
	  	<div class="container" style="width:80%">
	      	<div class="card-body">
                <h4>History Main Data:</h4>
                <form action="/admin/historydata" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-Department">
                      <label for="group">title1:</label>
                      <input type="text" class="form-control" name="title" value="{{$hist[0]->font}}">
                      <label for="group">title1 ar:</label>
                      <input type="text" class="form-control" name="titlear" value="{{$hist[1]->font}}">
                      <label for="group">title2:</label>
                      <textarea type="text" class="form-control" name="title2">{{$hist[0]->content}}</textarea>
                      <label for="group">title2 ar:</label>
                      <textarea type="text" class="form-control" name="title2ar">{{$hist[0]->content_ar}}</textarea>
                      <input type="checkbox" name="show" {{$hist[0]->year=='1'?'checked':''}}> Show This Section
                      <br>
                      <label for="group">Slide - image:</label>
                      <input type="file" name="img">
                      <br>
                      <img src="{{asset('/images/slide/'.$hist[1]->content)}}" width="300px">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
                <hr>
                <h4>Add New History:</h4>
                <form action="/admin/addhistory" method="post">
                    @csrf
                    <label for="group">year:</label>
                    <input type="text" class="form-control" name="year">
                    <label for="group">content:</label>
                    <textarea type="text" class="form-control" name="content"></textarea>
                    <label for="group">content ar:</label>
                    <textarea type="text" class="form-control" name="contentar"></textarea>
                    <label for="stitle">Date Awesome (Icon)</label>
                    <input type="text" class="form-control" id="ico" placeholder="Block Icon" name="icon" hidden>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Icons
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="overflow:scroll; height:400px;">
                            <?php $j=0; ?>
                            @foreach($icons as $icon)
                            @if($j%9==0)
                            <li>
                            @endif
                                <i class="icons fa {{$icon->icon}}" id="ic{{$icon->id}}"></i>
                            @if($j+10%9==0)
                            </li>
                            @endif
                            <?php $j++; ?>
                            @endforeach
                        </ul>
                    </div>
                    <script type="text/javascript">
                        @foreach($icons as $icon)
                        $('#ic{{$icon->id}}').click(function(){
                            $('#ico').val("{{$icon->icon}}");
                        });
                        @endforeach
                    </script>
                    <br>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
                <hr>
                <h4>Edit History</h4>
                @foreach($hist as $k=>$h)
                @if($k>1)
                <form action="/admin/edithist/{{$h->id}}" method="post" style="display: none;" id="fr{{$h->id}}">
                    @csrf
                    <label for="group">year:</label>
                    <input type="text" class="form-control" name="year" value="{{$h->year}}">
                    <label for="group">content:</label>
                    <textarea type="text" class="form-control" name="content">{{$h->content}}</textarea>
                    <label for="group">content ar:</label>
                    <textarea type="text" class="form-control" name="contentar">{{$h->content_ar}}</textarea>
                    <label for="stitle">Date Awesome (Icon)</label>
                    <input type="text" class="form-control" id="ico{{$k}}" placeholder="Block Icon" name="icon" value="{{$h->font}}" hidden>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Icons
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="overflow:scroll; height:400px;">
                            <?php $j=0; ?>
                            @foreach($icons as $icon)
                            @if($j%9==0)
                            <li>
                            @endif
                                <i class="icons fa {{$icon->icon}}" id="i{{$k}}c{{$icon->id}}"></i>
                            @if($j+10%9==0)
                            </li>
                            @endif
                            <?php $j++; ?>
                            @endforeach
                        </ul>
                    </div>
                    <script type="text/javascript">
                        @foreach($icons as $icon)
                        $('#i{{$k}}c{{$icon->id}}').click(function(){
                            $('#ico{{$k}}').val("{{$icon->icon}}");
                        });
                        @endforeach
                    </script>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/remhist/{{$h->id}}" class="btn btn-danger">Remove</a>
                </form>
                @endif
                @endforeach
                <br>
                <select class="form-control" id="sel">
                  <option value="0">Select Date</option>
                  @foreach($hist as $k=>$h)
                  @if($k>1)
                  <option value="{{$h->id}}">{{$h->year}}</option>
                  @endif
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#sel').change(function(){
                    @foreach($hist as $k=>$h)
                    @if($k>1)
                    if($('#sel').val()=={{$h->id}}){
                        $('#fr{{$h->id}}').show();
                    }else{
                        $('#fr{{$h->id}}').hide();
                    }
                    @endif
                    @endforeach
                });
                </script>
            </div>
      </div>
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © {{date('Y')}} By : <a href="http://touch-corp.com">Touch-Corp</a></span>
          </div>
        </div>
      </footer>

  </div>
  <!-- /.content-wrapper -->
</div>
@stop