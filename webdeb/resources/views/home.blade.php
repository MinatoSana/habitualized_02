@extends('layouts.app')

@section('content')
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
                    @if(count($habits) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Habits</th>
                            <th></th>
                            <th></th>
                        </tr>
                    
                    @foreach($habits as $habit)
                    <tr>
                        <td><a href="/habits/{{$habit->id}}">{{$habit->description}}</a></td>
                        <td><a href="/habits/{{$habit->id}}/edit" class="btn btn-warning">Edit</a></td>
                        <td>
                        <form action="/habits/{{$habit->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @else
                    <p>You have no habits</p>
                @endif
                    You are logged in!
                    <a href="/habits/create">long cut</a>
                    <a href="#" data-toggle="modal" data-target="#ModalLoginForm">Add Habit</a>
                    <div id="ModalLoginForm" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-xs-center">Log in like a Boss</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST" action="/habits/create">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label">Description:</label>
                                            <div>
                                                <input type="text" class="form-control input-lg" name="description" placeholder="Description">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Reason:</label>
                                            <div>
                                                <input type="text" class="form-control input-lg" name="reason" placeholder="Reason">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-info btn-block">Add Habit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
