@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(207, 196, 196);">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Create Post</h2>
                    <form action="/habits/create" method="POST" style="">
                        @csrf
                        <label for="description">Description:</label>
                        <input type="text" placeholder="Description" name="description" class="form-control">
                        <label for="reason">Reason:</label>
                        <input type="text" placeholder="Type Reason Here" name="reason" class="form-control">
                        <button type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
