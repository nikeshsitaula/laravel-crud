{{--this page is for when the user clicks in the blog for the more content inside the link--}}

@extends('layouts.app')

@section('content')
    <a href="/offers" class="btn-btn-default">Go Back</a>
    <h1>{{$offer->title}}</h1>
    <div>
        {{--two exclamation signs instead of two brackets so that the ckeditor will parse the html--}}
        {{$offer->location}}<br>
        {!!$offer->itinerary!!}<br>
        {!!$offer->essential_info!!}
    </div>
    <hr>
    <small>Written on {{$offer->created_at}} by {{$offer->user->name}} </small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $offer->user->id)
            <a href="/offers/{{$offer->id}}/edit" class="btn btn-default">Edit</a>
            {!! Form::open(['action'=>['PostsController@destroy',$offer->id],'method'=>'POST','class'=>'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
