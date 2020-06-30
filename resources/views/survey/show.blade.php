@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <h1>{{ $questionaire->title }}</h1>

        <form action="/surveys/{{ $questionaire->id }}-{{Str::slug($questionaire->title)}}" method="POST">
        @csrf

        @foreach($questionaire->questions as $key => $question)
        
        <div class="card mt-4">
        <div class="card-header">
            <strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>
            
            <div class="card-body">

                @error('responses.'. $key . '.answer_id')
            <small class="text-danger">{{ $message }}</small>
                @enderror
                <ul class="list-group">
                    @foreach ($question->answers as $answer)
                    <label for="answer{{ $answer->id }}">
                        <li class="list-group-item">
                            <input value="{{ $answer->id }}" type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" class="mr-2" {{ old('responses.'. $key . '.answer_id') == $answer->id ? 'checked' : ''}}>
                            {{$answer->answer}}
                            </li>

                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                    </label>
                
                    @endforeach
                </ul>
            </div>
           
               
            </div> 

        @endforeach
       

            <div class="card mt-4">
                <div class="card-header">Your Information</div>
                <div class="card-body">
            <div class="form-group">
            <label for="name">Your Name</label>
            <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            <small id="nameHelp" class="form-text text-muted">Hello, what's your name ? </small>
            @error('name')
         <small class="text-danger">{{$message}}</small>  
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Your Email</label>
            <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
            <small id="emailHelp" class="form-text text-muted">Your email please</small>
            @error('email')
            <small class="text-danger">{{$message}}</small>      
            @enderror
          </div>
         <div>
            <button class="btn btn-dark" type="submit">Complete Survey</button>
         </div>
         
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
