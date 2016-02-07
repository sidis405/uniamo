@extends('layouts.master')

@section('content')

<div class="row">

        <div class="col-sm-8 blog-main">
  
                  <div class="blog-post">
                    <h2 class="blog-post-title">{{$page->title}}</h2>
                    
                    
                    {!! $page->content !!}

                     @include('layouts.categories-tags', array('item' =>$page))
                  </div><!-- /.blog-post -->

        @include('layouts.related')


        </div><!-- /.blog-main -->

        @include('layouts.sidebar')

      </div>


      @stop