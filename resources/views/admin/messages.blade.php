@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
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
                <h4>Click on Message to Open !</h4>
                <table class="table table-dark">
                <thead style="margin-top: 5%">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Subject</th>
                  </tr>

                </thead>
                <tbody>
                    @foreach($messages as $k=>$m)
                  <tr data-toggle="modal" data-target="#mes{{$k}}" style="cursor: pointer;{{$m->seen==0?'font-weight: bold;':''}}">
                    <th>{{$k+1}}</th>
                    <td>{{$m->name}}</td>
                    <td>{{$m->phone}}</td>
                    <td> {{$m->email}} </td>
                    <td>{{$m->subject}} </td>
                  </tr>
                  <!-- Modal -->
                    <div id="mes{{$k}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Message From {{$m->name}}</h4>
                          </div>
                          <div class="modal-body">
                            <p>{{$m->message}}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
              {{ $messages->links() }}
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