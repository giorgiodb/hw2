<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Record</title>
        <meta charset="utf-8">
        <link rel="icon" href="immagini/disco.png" type="image/x-icon">
        <link rel="stylesheet" href="{{ url('css/home.css') }}">
        <script src="{{ url('js/home.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Palette+Mosaic&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas Neue" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela Gothic One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        <section class="flex-all">
            <div class="flex-left">
                <div class="profile">
                    <nav>
                        <div class="logaut">
                            <a href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket">&nbsp;</i>Logout</a>
                        </div>
                    </nav>
                    <div class="foto"><img src="{{ $user['foto'] }}"></div>
                    <div class="nome">{{ $user['username'] }}</div>
                </div>
                <div class="line">
                    <p>Vuoi aggiunere un brano alla tua playlist o tra i preferiti?</p> &nbsp; 
                    <p class="button"><a href="{{ route('search') }}">Clicca qui</a></p>
                </div>
                <div class="search">
                    <p id="pref"><i class="fa-solid fa-heart-circle-check">&nbsp;</i>Preferiti</p>
                    <p id="play"><i class="fa-solid fa-circle-play">&nbsp;</i>Playlist</p>
                </div>
                <article id="view-pref">
                    <span class="t1">Nessuna canzone presente!</span>
                </article>
                <article id="view-play">
                    <span class="t2">Nessuna canzone presente!</span>
                </article>
            </div>
            <div class="flex-right">
                <div class="community">
                    <div class="title">
                        Tell Us Yours
                    </div>
                    <div class="post">
                        <a><p>Crea un post&nbsp;<i class="fa-solid fa-plus"></i></p></a>
                        <!--modale-->
                        <section id="modal-view" class="hidden">
                            <div class="element">
                                <button id="close_modal">Chiudi</button>
                                <h2>Che c'è di nuovo</h2>
                                <form method="post" action="{{ route('createPost') }}">
                                    @csrf
                                    <textarea id="messaggio" name="text" placeholder="Scrivi qui.." maxlength="255"></textarea>
                                    <input type="submit" value="Pubblica">
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- post -->
                <div id="posts">
                </div>
            </div>
        </section>
    </body>
</html>