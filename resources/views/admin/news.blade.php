@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Newsletter List</li>
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
          <table class="table table-dark">
                <thead style="margin-top: 5%">
                  <tr>
                    <th>#</th>
                    <th>email</th>
                  </tr>

                </thead>
                <tbody>
                    @foreach($news as $k=>$n)
                  <tr>
                    <th>{{$k+1}}</th>
                    <td>{{$n->email}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $news->links() }}
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