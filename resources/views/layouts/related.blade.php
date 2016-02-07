<div class="related-news">
          @foreach(array_chunk($related, 2) as $row)

              <div class="row">
            
            @foreach($row as $item)
                    
                    <div class="col-sm-6">
                         @if($item['image_path'] !== null)
                              
                              <div class="news-image-container">
                                <img src="/immagini/{{$item['image_path']}}" class="news-image news-image-boxed">
                              </div>

                              <h4><a href="/news/{{$item['id']}}/{{$item['slug']}}">{{$item['title']}}</a></h4>
                              <p>{{$item['excerpt']}}
                                <a href="/news/{{$item['id']}}/{{$item['slug']}}" class="read-more">Leggi di più</a>
                            </p>

                            @endif
                    </div>
            
            @endforeach
            
                </div>

          @endforeach
      </div>