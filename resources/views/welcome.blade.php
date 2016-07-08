@extends('layout')

@section('content')
        <h1>SEARCH</h1>
        
        <form method = "POST" action = "/search">
            <div class="form-group">
                <input type ="text" name = "keyword">
            </div>

            <div class="form-group">
                <button type ="submit" class = "btn btn-primary">Search</button>
            </div>
        </form>

@stop