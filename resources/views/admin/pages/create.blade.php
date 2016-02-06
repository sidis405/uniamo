@extends('admin.layouts.master')

@section('header_scripts')

<link href="/adm/vendors/bower_components/summernote/dist/summernote.css" rel="stylesheet">
<link href="/adm/vendors/farbtastic/farbtastic.css" rel="stylesheet">
<link href="/adm/vendors/chosen_v1.4.2/chosen.min.css" rel="stylesheet">

@stop

@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>Pagine</h2>
            
            <ul class="actions">
                <li>
                    <a href="/admin/pagine">
                        <i class="zmdi zmdi-format-list-bulleted"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="" class="refresh-page">Aggiorna pagina</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <form role="form" method="POST" action="/admin/pagine" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="card">
                <div class="card-header">
                    <h2>Crea Una Nuova Pagina</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div class="form-group fg-line">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control input-sm" id="title" placeholder="Il titolo della pagina" name="title" required>
                    </div>
               
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2>Testo Pagina</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div class="row">
                        <textarea name="content"  class="html-editor" required></textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Categoria e Tags</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div class="row">
                        @include('admin.layouts.partials.categories_partial', array('selected' => []))
                        @include('admin.layouts.partials.tags_partial', array('selected' => []))
                    </div>
                </div>
            </div>

            <div class="card">
                
                <div class="card-body card-padding">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="active" checked="">
                            <i class="input-helper"></i>
                            Pubblica questa Pagina
                        </label>
                    </div>
                </div>
            </div>

            

            <div class="card">
                
                <div class="card-body card-padding">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <button type="reset" class="btn btn-warning btn-sm m-t-10">Abbandona</button>
                        </div>
                        <div class="col-sm-6 text-center">
                            <button type="submit" class="btn btn-primary btn-sm m-t-10">Salva</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</section>
@stop
@section('footer_scripts')
<script src="/adm/vendors/bower_components/summernote/dist/summernote.min.js"></script>
<script src="/adm/vendors/fileinput/fileinput.min.js"></script>
<script src="/adm/vendors/input-mask/input-mask.min.js"></script>
<script src="/adm/vendors/farbtastic/farbtastic.min.js"></script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.html-editor').ckeditor({
            language: 'it',
            uiColor: '#ffffff',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
        // $('.textarea').ckeditor(); // if class is prefered.

    </script>

<script src="/adm/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="/adm/vendors/bower_components/summernote/dist/summernote.min.js"></script>
<script src="/adm/vendors/chosen_v1.4.2/chosen.jquery.min.js"></script>
<script src="/adm/vendors/bower_components/autosize/dist/autosize.min.js"></script>
@stop

@section('sidebar_scripts')
        
    <script>
    
    activateSidebar('pagine_menu', 'aggiungi_pagine');

    </script>    


@stop