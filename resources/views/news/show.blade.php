@extends('layouts.master')

@section('content')

<div class="row">

        <div class="col-sm-8 blog-main">
  
                  <div class="blog-post">
                    <h2 class="blog-post-title">{{$news->title}}</h2>
                    <p class="blog-post-meta">{{$news->created_at->format("F j, Y, g:i a")}} by <a href="/utente/{{$news->user->name}}">{{$news->user->name}}</a></p>
                    
                    @if($news->image_path !== null)
                      
                      <div class="news-image-container">
                        <img src="/immagini/{{$news->image_path}}" class="news-image">
                      </div>
                      
                    @endif

                    <p>{{$news->excerpt}}</p>
                    <hr>
                    {!! $news->body !!}

                     @include('layouts.categories-tags', array('item' =>$news))
                  </div><!-- /.blog-post -->

        @include('layouts.related')


        </div><!-- /.blog-main -->

        @include('layouts.sidebar')


      </div><!-- /.row -->
      @stop