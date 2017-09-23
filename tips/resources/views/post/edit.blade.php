@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Edit a post</h1>
            <form action="{{route('post.update', $post->id)}}" method="post" class="form-horizontal  ">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="title">Title:</label>
                    <div class="col-sm-10">
                        <input type="title" name="title" value="{{$post->title}}" class="form-control" id="title"
                               placeholder="Enter title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Body:</label>
                    <div class="col-sm-10">
                        <input type="text" name="body" value="{{$post->body}}" class="form-control" id="pwd"
                               placeholder="Enter body">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input name="approved" checked="{{$post->approved?1:0}}" type="checkbox">
                                Approved</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection