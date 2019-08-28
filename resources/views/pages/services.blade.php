@extends('layouts.app')
@section('content')
    

       <h1>{{$title}}</h1>
       @if(count($service)>0)
       <ul class="list-group">
       @foreach ($service as $item)
       <li class="list-group-item">{{$item}}</li>    
       @endforeach
       @endif
       </ul>
       <p>this is laravel application by aniket</p>
@endsection