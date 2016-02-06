@extends('layouts.master')

@section('content')

<div class="blog-header">
        <h1 class="blog-title">Tag: #{{$tag->tag}}</h1>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
          
          @if(count($tag->news) > 0)
            
            @foreach($tag->news as $item)
                  <div class="blog-post">
                    <h2 class="blog-post-title"><a href="/news/{{$item->id}}/{{$item->slug}}">{{$item->title}}</a></h2>
                    <p class="blog-post-meta">{{$item->created_at->format("F j, Y, g:i a")}} by <a href="/utente/{{$item->user->name}}">{{$item->user->name}}</a></p>
                    
                    @if($item->image_path !== null)
                      
                      <div class="news-image-container">
                        <img src="/immagini/{{$item->image_path}}" class="news-image">
                      </div>
                      
                    @endif

                     <p>{{$item->excerpt}}
                        <a href="/news/{{$item->id}}/{{$item->slug}}" class="read-more">Leggi di più</a>
                    </p>
                     @include('layouts.categories-tags')
                    <hr>
                  </div><!-- /.blog-post -->

                @endforeach
          
          @else
            <p>
              <h2>Non ci sono post</h2>
            </p>
          @endif

          <nav>
            <ul class="pager">
              <li><a href="http://getbootstrap.com/examples/blog/#">Previous</a></li>
              <li><a href="http://getbootstrap.com/examples/blog/#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        @include('layouts.sidebar')

      </div><!-- /.row -->
      @stop