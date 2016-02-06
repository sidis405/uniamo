<hr>

@if(count($item->categories) > 0)
<span>Categorie <i class="fa fa-sitemap fa-fw"></i> :
  @foreach($item->categories as $category)
  <a href="/categorie/{{strtolower($category->slug)}}">{{ucfirst(strtolower($category->category))}}</a>;
  @endforeach
</span>
@endif
@if(count($item->tags) > 0)
<span>Tag <i class="fa fa-puzzle-piece fa-fw"></i>:
  @foreach($item->tags as $tag)
  <a href="/tags/{{strtolower($tag->slug)}}">#{{ucfirst(strtolower($tag->tag))}}</a>;
  @endforeach
</span>
@endif