@if(strlen($news->image_path) > 1)

<div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height:150px"><img src="/immagini/{{$news->image_path}}"></div>
    <div>
        <span class="btn btn-info btn-file">
            <span class="fileinput-new">Seleziona nuova immagine</span>
            <span class="fileinput-exists">Cambia</span>
            <input type="file" name="image_path">
        </span>
        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
    </div>
</div>
@else
<div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
    <div>
        <span class="btn btn-info btn-file">
            <span class="fileinput-new">Seleziona immagine</span>
            <span class="fileinput-exists">Cambia</span>
            <input type="file" name="image_path" required>
        </span>
        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
    </div>
</div>

@endif