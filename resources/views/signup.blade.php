<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Record</title>
        <meta charset="utf-8">
        <link rel="icon" href="immagini/disco.png" type="image/x-icon">
        <link rel="stylesheet" href="{{ url('css/signup.css') }}">
        <script src="{{ url('js/signup.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Palette+Mosaic&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas Neue" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela Gothic One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla One" rel="stylesheet">
    </head>
    <body>
        <header class="flex-tot">
            <div class="flex-img">
                <div class="title">
                    RECORD
                </div>
            </div>
            <div class="flex-form">
                <p>
                    Scegli il tuo avatar:
                </p>
                <section class="choice-grid">
                    <div>
                        <img src="./immagini/img1.jpeg"/>
                    </div>
                    <div>
                        <img src="./immagini/img2.jpeg"/>
                    </div>
                    <div>
                        <img src="./immagini/img3.jpeg"/>
                    </div>
                    <div>
                        <img src="./immagini/img4.jpeg"/>
                    </div>
                </section>
                <form id=form name='nome_form' method='post' action="{{ route('registration') }}">
                    @csrf
                    <p class="name">
                        <label>
                            Nome <input type='text' name='name' class="det" value="{{ old('name') }}">
                        </label>
                        <span class="error">\</span>
                    </p>

                    <p class="surname">
                        <label>
                            Cognome <input type='text' name='surname' class="det" value="{{ old('surname') }}">
                        </label>
                        <span class="error">\</span>
                    </p>

                    <p class="username">
                        <label>
                            Nome utente <input type='text' name='username' class="det" value="{{ old('username') }}">
                        </label>
                        <span class="error">\</span>
                    </p>

                    <p class="email">
                        <label>
                            Email <input type='email' name='email' class="det" value="{{ old('email') }}">
                        </label>
                        <span class="error">\</span>
                    </p>
                    
                    <p class="password">
                        <label>
                            <img src="./immagini/occhio2.png">
                            Password <input type='password' name='password' class="det" id="pwd">
                        </label>
                        <span class="error">\</span>
                    </p>

                    <p class="confirm_password">
                        <label>
                            Conferma password <input type='password' name='confirm_password' class="det">
                        </label>
                        <span class="error">\</span>
                    </p>

                    <p class="foto">
                        <label>
                            <input type='hidden' name='foto' value="{{ old('foto') }}">
                        </label>
                    </p>
                    
                    <div class="details">
                        <input type="submit" value="Registrati" id="submit">
                    </div>
                    <div class="signup">
                        Hai già un account? <a href="{{ route('login') }}">Accedi</a>
                    </div>
                </form>
            </div>
        </header>
    </body>
</html>