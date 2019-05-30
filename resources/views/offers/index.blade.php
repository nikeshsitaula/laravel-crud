@extends('layouts.app')

@section('content')
    <h3> Offers</h3>
    @if(count($offers)>0)
        @foreach($offers as $offer)
            <div class="well">
                    <h3><a href="/offers/{{$offer->id}}">{{$offer->title}}</a></h3>
                    <small>Written on {{$offer->created_at}} by {{$offer->user->name}}</small>
            </div>
        @endforeach
        {{--for the links of pagination in bottom of page--}}
        {{$offers->links()}}
    @else
        <p>No offers found</p>
    @endif
@endsection
