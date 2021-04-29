@extends('layouts.app')

@section('content')

    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card rounded text-white bg-dark" >
                <div class="card-header" style="font-family: 'Dancing Script', cursive; color: rgb(210, 212, 61)">Habits</div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('remove'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('remove') }}
                        </div>
                    @endif
                    @if(count($habits) > 0)
                    <table class="table table-dark " >
                        <tr style="color: rgb(210, 212, 61);">
                            <th>Description</th>
                            <th></th>
                            <th>Time Lapse</th>
                            <th></th>
                        </tr>
                    
                    @foreach($habits as $habit)
                    <tr style="font-family: 'Montserrat', sans-serif; color: rgb(210, 212, 61);">
                        <td>{{$habit->description}}</td>
                        <td><a href="/habits/{{$habit->id}}" class="btn btn-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Show Details</a></td>
                        <td>
                            {{$habit->time_lapse}}
                        </td>
                        <td><form action="/habits/{{$habit->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @else
                    <p>You have no habits</p>
                @endif
                    <a href="#" data-toggle="modal" data-target="#ModalLoginForm" class="btn btn-success col-md-12" style="font-family: 'Montserrat', sans-serif;"><i class="fa fa-plus" aria-hidden="true"></i> Add Habit</a>
                    <div id="ModalLoginForm" class="modal fade ">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: #292b2c; font-family: 'Montserrat', sans-serif;">
                                <div class="modal-header">
                                    <h4 class="modal-title text-xs-center">Add Habit</h4>
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
                                                <textarea class="form-control input-lg" name="reason" placeholder="Reason"> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success btn-block">Add Habit</button>
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


@endsection
