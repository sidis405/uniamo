<div class="form-group fg-line col-sm-12">
    <p class="f-500 c-black m-b-15">Tags</p>
    <select class="tag-select" name="tags[]" multiple data-placeholder="Tag nelle quali apparirà la news/pagina" required>
        @foreach($tags as $tag)
        <option value="{{$tag->id}}" @if(in_array($tag->id, $selected)) selected @endif>{{$tag->tag}}</option>
        @endforeach
    </select>
</div>