@extends('admin/master')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Blogs Control</a>
            </li>
            <li class="breadcrumb-item active">Blogs</li>
          </ol>
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
            {{-- <h3>Blogs Categories Control</h3> --}}
            {{-- <h5>Add New Category</h5>
            <form action="/admin/blogcat" method="post">
                {{ csrf_field() }}
                <div class="form-groub">
                    <label>Category name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <br>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
            <h5>Edit Category</h5>
            @foreach($blcat as $blca)
            <form action="/admin/blogcat/{{$blca->id}}" method="post" id="cat{{$blca->id}}" style="display: none">
                {{ csrf_field() }}
                <div class="form-groub">
                    <label>Category name</label>
                    <input type="text" name="name" class="form-control" value="{{$blca->name}}">
                </div>
                <br>
                <button class="btn btn-success" type="submit">Save</button>
                <a class="btn btn-danger" href="/admin/blogcat/remove/{{$blca->id}}">Remove Category</a>
                <p>Remember that if you remove category - all blogs related will be removed too.</p>
            </form>
            <br>
            @endforeach
            <select class="form-control" id="blcatselector">
                <option value="">Select Category</option>
                @foreach($blcat as $blca)
                <option value="{{$blca->id}}">{{$blca->name}}</option>
                @endforeach
            </select>
            <script type="text/javascript">
                $('#blcatselector').change(function(){
                @foreach($blcat as $blca)
                if($('#blcatselector').val()=={{$blca->id}}){
                    $('#cat{{$blca->id}}').show();
                }else{
                    $('#cat{{$blca->id}}').hide();
                }
                @endforeach
            });
            </script>
            <br>
            <hr><hr> --}}
            <h3>Blogs Control</h3>
            <h5>Create New Blog</h5>
            <form action="/admin/blog" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-groub">
                    {{-- <label>Category</label>
                    <select class="form-control" name="cate">
                        <option value="">Select Category</option>
                        @foreach($blcat as $blca)
                        <option value="{{$blca->id}}">{{$blca->name}}</option>
                        @endforeach
                    </select> --}}
                    <label>Blog Title</label>
                    <input type="text" name="title" class="form-control">
                    <label>Blog Title PT</label>
                    <input type="text" name="titlept" class="form-control">
                    <label>Blog Main Image</label>
                    <input type="file" class="form-control-file" name="image">
                    <label>Small Description</label>
                    <input type="text" name="sdesc" class="form-control">
                    <label>Small Description PT</label>
                    <input type="text" name="sdescpt" class="form-control">
                    <label>Blog Content</label>
                    <textarea name="content">{{old('content')}}</textarea>
                    <label>Blog Content PT</label>
                    <textarea name="contentpt">{{old('contentpt')}}</textarea>
                    <a href="/upload/editor" target="blank" class="btn btn-success">Upload image & get link</a>
                    <p>
                        To Attach Image (click upload image & get link) then take link copy then click on image icon in text editor then paste link ! the image will appear then customize width/ height of image then ok.
                    </p>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Publish</button>
                <br>
                <hr><hr>
            </form>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
                   <script>
                        CKEDITOR.replace( 'contentpt' );
                    </script>
            <h5>Edit Blog</h5>
            @foreach($blogs as $blog)
            <form action="/admin/blog/{{$blog->id}}" method="post" enctype="multipart/form-data" id="blogx{{$blog->id}}" style="display: none;">
                {{ csrf_field() }}
                <div class="form-groub">
                    {{-- <label>Category</label>
                    <select class="form-control" name="cate">
                        <option value="">Select Category</option>
                        @foreach($blcat as $blca)
                        @if($blog->category==$blca->id)
                        <option value="{{$blca->id}}" selected>{{$blca->name}}</option>
                        @else
                        <option value="{{$blca->id}}">{{$blca->name}}</option>
                        @endif
                        @endforeach
                    </select> --}}
                    <label>Blog Title</label>
                    <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                    <label>Blog Title PT</label>
                    <input type="text" name="titlept" class="form-control" value="{{$blog->title_PT}}">
                    <label>Blog Main Image</label>
                    <input type="file" class="form-control-file" name="image">
                    <img src="{{asset('/images/blogs')}}/{{$blog->image}}" width="120px">
                    <label>Small Description</label>
                    <input type="text" name="sdesc" class="form-control" value="{{$blog->sdesc}}">
                    <label>Small Description PT</label>
                    <input type="text" name="sdescpt" class="form-control" value="{{$blog->sdesc_PT}}">
                    <label>Blog Content</label>
                    <textarea name="content" id="contentx{{$blog->id}}">{{$blog->content}}</textarea>
                    <label>Blog Content PT</label>
                    <textarea name="contentpt" id="contentxpt{{$blog->id}}">{{$blog->content_PT}}</textarea>
                    <a href="/upload/editor" target="blank" class="btn btn-success">Upload image & get link</a>
                    <p>
                        To Attach Image (click upload image & get link) then take link copy then click on image icon in text editor then paste link ! the image will appear then customize width/ height of image then ok.
                    </p>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="/admin/blog/remove/{{$blog->id}}" class="btn btn-danger">Remove Blog</a>
                <br><br>
                <script type="text/javascript">
                    CKEDITOR.replace(document.getElementById('contentx{{$blog->id}}'));
                </script>
                <script type="text/javascript">
                    CKEDITOR.replace(document.getElementById('contentxpt{{$blog->id}}'));
                </script>
            </form>
            @endforeach
            <select class="form-control" id="perselector">
                  <option value="0">Select Blog</option>
                  @foreach($blogs as $blog)
                  <option value="{{$blog->id}}">{{$blog->title}}</option>
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#perselector').change(function(){
                    @foreach($blogs as $blog)
                    if($('#perselector').val()=={{$blog->id}}){
                        $('#blogx{{$blog->id}}').show();
                    }else{
                        $('#blogx{{$blog->id}}').hide();
                    }
                    @endforeach
                });
                </script>
    </div>
</div>
@stop
