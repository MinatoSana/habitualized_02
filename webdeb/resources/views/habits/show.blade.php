@extends('layouts.app')

@section('inline')
<style>
    input[type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    input[type=radio] + i {
    cursor: pointer;
    }
    input[type=radio]:checked + i {
    outline: 2px solid rgb(27, 27, 27);
    }
    .chi{
        color:#71ff05;
    }
    .red{
        color:#ff2205;
    }
    .ow{
        color:#fa6e0a;
    }
</style>
@endsection
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
                <small>Added on {{$habit->created_at}} by {{$habit->user->lastname .',' .$habit->user->firstname}}</small>
                <hr>
            <h3>Number of Smile: {{$smileys}}</h3>
            <h3>Number of Days: {{$events->count()}}</h3>
                <div class="card-deck">
                @forelse($events as $key => $event)
                <div class="col-auto mb-3">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <center>
                        <p>Day {{++$key}}</p>
                        @if( $event->emote == 'smile')
                            <i class="fas fa-smile fa-3x chi"></i>
                        @elseif( $event->emote == 'meh')
                            <i class="fas fa-meh fa-3x ow"></i>
                        @else 
                            <i class="fas fa-frown fa-3x red"></i>
                        @endif
                        </center>
                    </div>
                </div>
            </div>
                @empty
                    <div class="container" style="padding: 20%; width:90%; height:20%; border: 1px solid black; border-radius:1rem;">
                        <h1>Start Tracking Now</h1>
                    </div>
                @endforelse
            </div>
            
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
                                <label for="date" class="control-label">Date:</label><input name="date" type="date" value="{{date('Y-m-d')}}"><br>
                                    <label class="control-label">Rating:</label><br>
                                    <label>
                                        <input type="radio" name="emote" value="smile">
                                        <i class="fas fa-smile fa-7x chi"></i>
                                    </label>
                                    <label>
                                        <input type="radio" name="emote" value="meh">
                                        <i class="fas fa-meh fa-7x ow"></i>
                                    </label>
                                    <label>
                                        <input type="radio" name="emote" value="frown">
                                        <i class="fas fa-frown fa-7x red"></i>
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
