@extends('layouts.app')
@section('content')
<style>
    #back{
       
        margin-bottom: 15px;
      
        margin-left:100%;
        

    }
    </style>
<a href="/posts" class="btn btn-primary" id="back">Go Back</a>

<div class="jumbotron">
<h1><b>{{$post->title}}<b></h1>
<small><i>written on {{$post->created_at}}</i></small>
<div>
  {{$post->body}}

</div>
</div>
@endsection