@extends('layouts.app')
@section('content')
<h3>Posts</h3>
@if(count($posts)>0)
  @foreach ($posts as $item)
     <div class="card card-body bg-grey">
     <h3><a href="/posts/{{$item->id}}">{{$item->title}}</a></h3>
  
     <small>Written on  {{$item->created_at}} </small>
    </div>
    <br>
  @endforeach
   {{$posts->links()}} 

@else
  <h3>No posts found!</h3>

   @endif
@endsection