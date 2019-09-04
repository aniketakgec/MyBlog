@extends('layouts.app')
@section('content')
<style>
    #back{
       
        margin-bottom: 15px;
      
        margin-left:100%;
        

    }
    </style>
<a href="/posts" class="btn btn-primary " id="back">Go Back</a>

<div class="jumbotron">
<h1><b>{{$post->title}}<b></h1>
<small><i>written on {{$post->created_at}}</i></small>
<div>
{!! $post->body !!}
</div>
</div>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->id==$post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-success" id="edit">Edit Post</a>
        {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}

        {{ Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
    @endif
        @endif

@endsection