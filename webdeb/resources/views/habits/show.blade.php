@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a href="/home"><-Go Back</a>
                <h1>{{$habit->description}}</h1>
                <div>
                    {!!$habit->reason!!}
                </div>
                <hr>
                <small>Added on {{$habit->created_at}} by {{$habit->user->name}}</small>
                <hr>
            <h3>Number of Smile: {{$smileys}}</h3>
                <table class="table table-striped">
                    <tr>
                        <th>Date</th>
                        <th>Rating</th>
                        <th></th>
                    </tr>
                @forelse($events as $event)
                <tr>
                    <td><a>{{$event->date}}</a></td>
                    <td>
                        @if( $event->emote == 'smile')
                            <i class="fas fa-smile fa-3x"></i>
                        @elseif( $event->emote == 'meh')
                            <i class="fas fa-meh fa-3x"></i>
                        @else 
                            <i class="fas fa-frown fa-3x"></i>
                        @endif
                    </td>
                    <td>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>Start Tracking Now</td>
                    </tr>
                @endforelse
            </table>
                </div>
            
            <a href="#" data-toggle="modal" data-target="#ModalLoginForm" class="btn btn-primary">Rate My Day</a>
            <div id="ModalLoginForm" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-xs-center">Rate Your Day</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="/habits/{$id}/event/store">
                                @csrf
                                <div class="form-group">
                                <input type="hidden" name="habit_id" value="{{ $habit->id }}">
                                <label for="date" class="control-label">Date:</label><input name="date" type="date" min="{{$habit->created_at->toDateString()}}" max="{{date('Y-m-d')}}"><br>
                                    <label class="control-label">Rating:</label><br>
                                    <label>
                                        <input type="radio" name="emote" value="smile">
                                        <i class="fas fa-smile fa-7x"></i>
                                    </label>
                                    <label>
                                        <input type="radio" name="emote" value="meh">
                                        <i class="fas fa-meh fa-7x"></i>
                                    </label>
                                    <label>
                                        <input type="radio" name="emote" value="frown">
                                        <i class="fas fa-frown fa-7x"></i>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-info btn-block">Rate</button>
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
@endsection
