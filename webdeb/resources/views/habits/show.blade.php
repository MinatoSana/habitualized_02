@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h1>{{$habit->description}}</h1>
                <div>
                    {!!$habit->reason!!}
                </div>
                <hr>
                <small>Written on {{$habit->created_at}} by {{$habit->user->name}}</small>
                <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
