@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new questionaire</div>

                <div class="card-body">
        <form action="/questionaires" method="POST">
         @csrf
         <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title">
            <small id="titleHelp" class="form-text text-muted">Give your questionaire a title that attracts attention.</small>
            @error('title')
         <small class="text-danger">{{$message}}</small>  
            @enderror
          </div>

          <div class="form-group">
            <label for="purpose">Purpose</label>
            <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="emailHelp" placeholder="Enter purpose">
            <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase responses.</small>
            @error('purpose')
            <small class="text-danger">{{$message}}</small>      
            @enderror
          </div>
            
          <button type="submit" class="btn btn-primary">Create Questionaire</button>
            
            </form> 

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
