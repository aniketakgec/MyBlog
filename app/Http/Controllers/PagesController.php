<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        
         return view('pages.index');
    }

    public function about(){
        $title='about us';
        return view('pages.about')->with('title',$title);
   }
   public function services(){
       $data=array(
           'title'=>'services',
           'service'=>['web design','seo','Aws ']

       );
    return view('pages.services')->with($data);
}



}