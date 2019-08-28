@extends('layouts.app')
@section('content')
    <style>

      #btn1{
        float: left;
      
        margin-left: 35%;
      }

    #btn2{
      float: right;
      margin-right: 35%;
     
      
      }
     </style>

<div class="jumbotron">
              <div class="container">
                <h1 class="display-3">MyBlog</h1>
                <p>This is a template for a Blog Web Application build on Laravel.</p>
                <p><a class="btn btn-primary btn-lg" href="#"  id="btn1"role="button">Login &raquo;</a></p>
                <p><a class="btn btn-success btn-lg" href="#" id="btn2" role="button">Register &raquo;</a></p>
                  {{-- <button type="button" class="btn btn-success">Success</button --}}
              </div>
</div>
           
@endsection
 
