@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ $questionaire->title }}</div>

                <div class="card-body">
        
                <a class="btn btn-dark" href="/questionaires/{{$questionaire->id}}/questions/create">Add New Question</a>
                <a class="btn btn-dark" href="/surveys/{{$questionaire->id}}-{{Str::Slug($questionaire->title)}}">Take survey</a>
                   
                </div>
            </div>

            @foreach ($questionaire->questions as $question)
            <div class="card mt-4">
                <div class="card-header">{{ $question->question }}</div>
                
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                    <li class="list-group-item d-flex justify-content-between">
                        <div>{{$answer->answer}}</div>
                        @if ($question->responses->count())
                        <div>{{intVal(($answer->responses->count()) * 100 / $question->responses->count())}}%</div>
                        @endif
                       
                      

                    </li>
                        @endforeach
                    </ul>
                </div>
               
                   <div class="card-footer">
                   <form action="/questionaires/{{$questionaire->id}}/questions/{{ $question->id }}" method="POST">
                           @method('DELETE')
                           @csrf

                           <button type="submit" class="btn btn-sm btn-outline-danger">Delete Questionaire</button>
                       </form>
                   </div>
                </div> 
            @endforeach
        </div>
    </div>
</div>
@endsection
