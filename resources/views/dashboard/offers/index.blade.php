@extends ('layouts.adminlte')

@section ('content-offers')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <ul class="nav navbar-nav navbar-right">
                        </ul>
                        <a href="/offers/create" class="btn btn-primary">Create Offer</a>
                        <h3>Your Offers</h3>

                        @if(count($offers) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>{{$offer->title}}</td>
                                        <td><a href="/offers/{{$offer->id}}/edit" class="btn btn-success btn-lg">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action'=>['PostsController@destroy',$offer->id],'method'=>'POST','class'=>'pull-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-lg'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no Offers</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
