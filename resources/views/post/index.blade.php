@extends('layouts.app')
@section('content')
<h3>Posts</h3>
@if(count($posts)>0)
  @foreach ($posts as $item)
 <div class="card card-body bg-light ">
    <div class="row">
        <div class="col-md-4 col-sm-4">
          <img style="width:50%; height:80%;" src="/storage/cover_images/{{$item->cover_image}}">
        </div>

        <div class="col-md-4 col-sm-4">
          
            <h3><a href="/posts/{{$item->id}}">{{$item->title}}</a></h3>
            <small>Written on  {{$item->created_at}}  by  {{$item->user['name']}}</small>
          
        </div>
  </div>
</div>

    <br>
  @endforeach
   {{$posts->links()}} 

@else
  <h3>No posts found!</h3>

   @endif
@endsection