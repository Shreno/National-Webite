@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Projects</li>
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
                <h4>Add New Project</h4>
                <form action="/admin/addpro" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-Department">
                        <label for="group">title:</label>
                        <input class="form-control" name="title">
                        <label for="group">title ar:</label>
                        <input class="form-control" name="titlear">
                        <label for="group">Content:</label>
                        <textarea class="form-control" name="content"></textarea>
                        <label for="group">Content ar:</label>
                        <textarea class="form-control" name="contentar"></textarea>
                        <label for="group">Address:</label>
                        <input class="form-control" name="address">
                        <label for="group">Address ar:</label>
                        <input class="form-control" name="addressar">
                        <label for="group">element 1:</label>
                        <input class="form-control" name="e1">
                        <label for="group">element 1 Details:</label>
                        <input class="form-control" name="e1d">
                        <label for="group">element 1 ar:</label>
                        <input class="form-control" name="e1ar">
                        <label for="group">element 1 Details ar:</label>
                        <input class="form-control" name="e1dar">
                        <label for="group">element 2:</label>
                        <input class="form-control" name="e2">
                        <label for="group">element 2 Details:</label>
                        <input class="form-control" name="e2d">
                        <label for="group">element 2 ar:</label>
                        <input class="form-control" name="e2ar">
                        <label for="group">element 2 Details ar:</label>
                        <input class="form-control" name="e2dar">
                        <label for="group">element 3:</label>
                        <input class="form-control" name="e3">
                        <label for="group">element 3 Details:</label>
                        <input class="form-control" name="e3d">
                        <label for="group">element 3 ar:</label>
                        <input class="form-control" name="e3ar">
                        <label for="group">element 3 Details ar:</label>
                        <input class="form-control" name="e3dar">
                        <label for="group">element 4:</label>
                        <input class="form-control" name="e4">
                        <label for="group">element 4 Details:</label>
                        <input class="form-control" name="e4d">
                        <label for="group">element 4 ar:</label>
                        <input class="form-control" name="e4ar">
                        <label for="group">element 4 Details ar:</label>
                        <input class="form-control" name="e4dar">
                        <label for="group">time:</label>
                        <input class="form-control" name="time">
                        <label for="group">time ar:</label>
                        <input class="form-control" name="timear">
                        <label for="group">price:</label>
                        <input class="form-control" name="price">
                        <br>
                        <label for="group">Image:</label>
                        <input type="file" name="img">
                        <br>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
                <hr>
                <h4>Edit</h4>
                @foreach($pro as $p)
                <form action="/admin/editpro/{{$p->id}}" method="post" enctype="multipart/form-data" id="fr{{$p->id}}" style="display: none;">
                    @csrf
                    <div class="form-Department">
                        <label for="group">title:</label>
                        <input class="form-control" name="title" value="{{$p->title}}">
                        <label for="group">title ar:</label>
                        <input class="form-control" name="titlear" value="{{$p->title_ar}}">
                        <label for="group">Content:</label>
                        <textarea class="form-control" name="content">{{$p->content}}</textarea>
                        <label for="group">Content ar:</label>
                        <textarea class="form-control" name="contentar">{{$p->content_ar}}</textarea>
                        <label for="group">Address:</label>
                        <input class="form-control" name="address" value="{{$p->address}}">
                        <label for="group">Address ar:</label>
                        <input class="form-control" name="addressar" value="{{$p->address_ar}}">
                        <label for="group">element 1:</label>
                        <input class="form-control" name="e1" value="{{$p->el1}}">
                        <label for="group">element 1 Details:</label>
                        <input class="form-control" name="e1d" value="{{$p->el1con}}">
                        <label for="group">element 1 ar:</label>
                        <input class="form-control" name="e1ar" value="{{$p->el1ar}}">
                        <label for="group">element 1 Details ar:</label>
                        <input class="form-control" name="e1dar" value="{{$p->el1conar}}">
                        <label for="group">element 2:</label>
                        <input class="form-control" name="e2" value="{{$p->el2}}">
                        <label for="group">element 2 Details:</label>
                        <input class="form-control" name="e2d" value="{{$p->el2con}}">
                        <label for="group">element 2 ar:</label>
                        <input class="form-control" name="e2ar" value="{{$p->el2ar}}">
                        <label for="group">element 2 Details ar:</label>
                        <input class="form-control" name="e2dar" value="{{$p->el2conar}}">
                        <label for="group">element 3:</label>
                        <input class="form-control" name="e3" value="{{$p->el3}}">
                        <label for="group">element 3 Details:</label>
                        <input class="form-control" name="e3d" value="{{$p->el3con}}">
                        <label for="group">element 3 ar:</label>
                        <input class="form-control" name="e3ar" value="{{$p->el3ar}}">
                        <label for="group">element 3 Details ar:</label>
                        <input class="form-control" name="e3dar" value="{{$p->el3conar}}">
                        <label for="group">element 4:</label>
                        <input class="form-control" name="e4" value="{{$p->el4}}">
                        <label for="group">element 4 Details:</label>
                        <input class="form-control" name="e4d" value="{{$p->el4con}}">
                        <label for="group">element 4 ar:</label>
                        <input class="form-control" name="e4ar" value="{{$p->el4ar}}">
                        <label for="group">element 4 Details ar:</label>
                        <input class="form-control" name="e4dar" value="{{$p->el4conar}}">
                        <label for="group">time:</label>
                        <input class="form-control" name="time" value="{{$p->time}}">
                        <label for="group">time ar:</label>
                        <input class="form-control" name="timear" value="{{$p->time_ar}}">
                        <label for="group">price:</label>
                        <input class="form-control" name="price" value="{{$p->price}}">
                        <br>
                        <label for="group">Image:</label>
                        <input type="file" name="img">
                        <br>
                        <img src="{{asset('/images/projects')}}/{{$p->image}}" width="150px">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/rempro/{{$p->id}}" class="btn btn-danger">Remove</a>
                </form>
                @endforeach
                <br>
                <select class="form-control" id="perselector">
                  <option value="0">Select Project</option>
                  @foreach($pro as $p)
                  <option value="{{$p->id}}">{{$p->title}}</option>
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#perselector').change(function(){
                    @foreach($pro as $p)
                    if($('#perselector').val()=={{$p->id}}){
                        $('#fr{{$p->id}}').show();
                    }else{
                        $('#fr{{$p->id}}').hide();
                    }
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