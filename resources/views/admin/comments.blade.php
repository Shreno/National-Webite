@extends('admin/master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Comments</a>
            </li>
            <li class="breadcrumb-item active">Admin</li>
          </ol>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">E-mail</th>
              <th scope="col">Comment</th>
              <th scope="col">Blog title</th>
              <th scope="col">Comment Date</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($allcomments as $req)
            <tr>
              <th scope="row">{{$i}}</th>
              <td>{{$req->name}}</td>
              <td>{{$req->email}}</td>
              <td>{{$req->comment}}</td>
              <td>{{$req->blogtitle}}</td>
              <td>{{$req->date}}</td>
              <td>
                @if($req->approve==0)
                <a href="/admin/comments/{{$req->id}}" style="color: green;">Approve it</a>
                @else
                <a href="/admin/comments/{{$req->id}}" style="color: red;">Remove it</a>
                @endif
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@stop