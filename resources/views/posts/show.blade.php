{{--this page is for when the user clicks in the blog for the more content inside the link--}}

@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn-btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_images}}">
    <br><br>
    <div>
        {{--two exclamation signs instead of two brackets so that the skeditor will parse the html--}}
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user->id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
            {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
