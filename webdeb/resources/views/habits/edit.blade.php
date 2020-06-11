@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Edit Post</h2>
                    <form action="/habits/{{$habit->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="description">Description:</label>
                        <input type="text" placeholder="Description" name="description" class="form-control" value="{{ old('description', $habit->description) }}">
                        <label for="reason">Reason:</label>
                        <input type="text" placeholder="Type Reason Here" name="reason" class="form-control" value="{{ old('reason', $habit->reason) }}">
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
