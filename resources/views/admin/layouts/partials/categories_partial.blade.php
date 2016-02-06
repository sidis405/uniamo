<div class="form-group fg-line col-sm-12">
    <p class="f-500 c-black m-b-15">Categorie</p>
    <select class="tag-select" name="categories[]" multiple data-placeholder="Categorie nelle quali apparirà la news/pagina" required>
        @foreach($categories as $category)
        <option value="{{$category->id}}" @if(in_array($category->id, $selected)) selected @endif>{{$category->category}}</option>
        @endforeach
    </select>
</div>