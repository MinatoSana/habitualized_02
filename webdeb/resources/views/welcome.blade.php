
@extends('layouts.app')
@section('inline')

@endsection

@section('content')
<div class="container" > 
    <center>
    <div> 
    {{-- <img style="float:right;" src="https://media.istockphoto.com/vectors/vector-cartoon-of-detective-with-magnifying-glass-and-tracker-dog-vector-id595150482?k=6&m=595150482&s=170667a&w=0&h=MCzEMMRLZhfqNedF5frMMvobi0x1Ars8KsuAktjkgpM=" alt=""> --}}
    <h2 style="color: rgb(210, 212, 61)"> Track Your Habits and Rate Your Day</h2>
    <p style="color: rgb(210, 212, 61)">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime molestias amet odio sapiente quibusdam doloremque animi accusamus! Non illo adipisci earum. Quaerat modi labore est sunt placeat excepturi alias nulla.</p>
    <a class="btn btn-success" href="{{ route('login') }}">Start Tracking Now</a>
    </div></center><br><br>
    <div class="card-deck">
        <div class="card bg-dark" style="color: rgb(210, 212, 61)">
          <div class="card-body">
            <div class="col-md-13 text-center">
            <h5 class="card-title">Create Your Habits</h5>
            <p class="card-text">Start normalizing the not so normal in the new normal. </p>
            
                <img style="width:200px;height: 200px;" src="https://icons-for-free.com/iconfiles/png/512/background+diagram+finance+pie+chart+presentation+report+icon-1320086872332895326.png">
            </div>
          </div>
        </div>
        <div class="card bg-dark" style="color: rgb(210, 212, 61)">
          <div class="card-body">
            <div class="col-md-13 text-center">
            <h5 class="card-title">Rate Your Day</h5>
            <p class="card-text">Pick an emoji to describe your day!</p>
            
                <img style="width:225px;height: 225px;" src="https://i.pinimg.com/originals/f2/36/52/f23652e5ebbd80be8a9e3fb8644436e8.gif">
            </div>
          </div>
        </div>
        <div class="card bg-dark" style="color: rgb(210, 212, 61)">
          <div class="card-body">
            <div class="col-md-13 text-center">
            <h5 class="card-title">About Us</h5>
            <p class="card-text">Learn More about the creators.</p>
            
                <img style="width:200px;height: 200px;" src="https://cdn4.iconfinder.com/data/icons/controls-add-on-flat/48/Contols_-_Add_On-26-512.png">
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
