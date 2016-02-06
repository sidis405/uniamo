<aside id="sidebar">
    <div class="sidebar-inner c-overflow">
        <div class="profile-menu">
            <a href="">
                <div class="profile-pic">
                    <!-- <img src="/adm/img/profile-pics/1.jpg" alt=""> -->
                </div>
            </a>
            <div class="profile-info">
                <span id="user_nicename">{{$user->present()->niceName()}}</span>
                <i class="zmdi zmdi-arrow-drop-down"></i>
            </div>
            <ul class="main-menu">
                <li>
                    <a href="/admin/impostazioni"><i class="zmdi zmdi-settings"></i> Impostazioni</a>
                </li>
                <li>
                    <a href="/logout"><i class="zmdi zmdi-time-restore"></i> Esci</a>
                </li>
            </ul>
        </div>
        <ul class="main-menu">
            <li class="active"><a href="/admin"><i class="zmdi zmdi-home"></i> Home</a></li>
            <li class="sub-menu" id="pagine_menu">
                <a href=""><i class="zmdi zmdi-widgets"></i> Pagine</a>
                <ul>
                    <li><a id="pagine_menu_lista_pagine" href="/admin/pagine">Lista Pagine</a></li>
                    <li><a id="pagine_menu_aggiungi_pagina"  href="/admin/pagine/crea">Aggiungi Pagina</a></li>
                </ul>
            </li>
            <li class="sub-menu" id="utenti_menu">
                <a href=""><i class="zmdi zmdi-accounts"></i> Utenti</a>
                <ul>
                    <li><a href="/admin/utenti" id="utenti_menu_lista_utenti">Lista Utenti</a></li>
                    <li><a href="/admin/utenti/crea" id="utenti_menu_aggiungi_utenti">Aggiungi Utente</a></li>
                </ul>
            </li>
   
        

            <li class="sub-menu" id="news_menu">
                <a href=""><i class="zmdi zmdi-comment-edit"></i>News</a>
                <ul>
                    <li><a href="/admin/news" id="news_menu_lista">Lista News</a></li>
                    <li><a href="/admin/news/crea" id="news_menu_aggiungi_news">Aggiungi News</a></li>
                </ul>
            </li>

            <li class="sub-menu" id="taxonomy_menu">
                <a href=""><i class="zmdi zmdi-remote-control-alt"></i>Categorie / Tags</a>
                <ul>
                    <li><a href="/admin/categorie" id="taxonomy_menu_categories">Categorie</a></li>
                    <li><a href="/admin/tags" id="taxonomy_menu_tags">Tag</a></li>
                </ul>
            </li>

            <li><a href="/admin/menu"  id="lista_news"><i class="zmdi zmdi-border-left"></i> Menu di navigazione</a></li>

           
            <li><a href="/admin/impostazioni"><i class="zmdi zmdi-settings"></i> Impostazioni</a></li>
            <li>
                <a href="/logout"><i class="zmdi zmdi-time-restore"></i> Esci</a>
            </li>
        </ul>
    </div>
</aside>