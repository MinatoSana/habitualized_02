
@extends('layouts.app')
@section('inline')

@endsection

@section('content')
<div class="container" > 
    <center>
    <div> 
    {{-- <img style="float:right;" src="https://media.istockphoto.com/vectors/vector-cartoon-of-detective-with-magnifying-glass-and-tracker-dog-vector-id595150482?k=6&m=595150482&s=170667a&w=0&h=MCzEMMRLZhfqNedF5frMMvobi0x1Ars8KsuAktjkgpM=" alt=""> --}}
    <h2 style="color: rgb(210, 212, 61)"> Track Your Habits and Rate Your Day</h2>
    <p style="font-family: 'Montserrat', sans-serif; color: rgb(210, 212, 61)">This Web Page helps you develop the determination in creating new habits. During this time of pandemic, many of us have a lot of time and we all want to do something new.
    But it is hard to make these new things a normal thing in our lives. You sometimes forget about it or you couldn't keep track of your progress. Well if that is the problem.
  this is the SOLUTION. The Habit tracker helps you keep track of the different habits that you wanted to develop. It slso allows you to rate your performance in doing the activity.
With this creating and keeping habits will be an easier task.</p>
    <a class="btn btn-success" href="{{ route('login') }}">Start Tracking Now</a>
    </div></center><br><br>
    <div class="card-deck">
        <div class="card bg-dark" style="color: rgb(210, 212, 61)">
          <div class="card-body">
            <div class="col-md-13 text-center">
            <h5 class="card-title">Create Your Habits</h5>
            <p class="card-text" style="font-family: 'Montserrat', sans-serif;">Start normalizing the not so normal in the new normal. </p>
            
                <img style="width:200px;height: 200px;" src="https://icons-for-free.com/iconfiles/png/512/background+diagram+finance+pie+chart+presentation+report+icon-1320086872332895326.png">
            </div>
          </div>
        </div>
        <div class="card bg-dark" style="color: rgb(210, 212, 61)">
          <div class="card-body">
            <div class="col-md-13 text-center">
            <h5 class="card-title">Rate Your Day</h5>
            <p class="card-text" style="font-family: 'Montserrat', sans-serif;">Pick an emoji to describe your day!</p>
            
                <img style="width:225px;height: 225px;" src="https://i.pinimg.com/originals/f2/36/52/f23652e5ebbd80be8a9e3fb8644436e8.gif">
            </div>
          </div>
        </div>
        <div class="card bg-dark" style="color: rgb(210, 212, 61)">
          <div class="card-body">
            <div class="col-md-13 text-center">
            <h5 class="card-title">About Us</h5>
            <p class="card-text" style="font-family: 'Montserrat', sans-serif;">Learn More about the creators.</p>
            
                <img style="width:200px;height: 200px;" src="https://cdn4.iconfinder.com/data/icons/controls-add-on-flat/48/Contols_-_Add_On-26-512.png">
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
