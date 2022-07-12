<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Record</title>
        <meta charset="utf-8">
        <link rel="icon" href="immagini/disco.png" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo e(url('css/search.css')); ?>">
        <script src="<?php echo e(url('js/search.js')); ?>" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Palette+Mosaic&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas Neue" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela Gothic One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        <section class="flex-all">
            <div class="flex-search">
                <div class="profile">
                    <nav class="home">
                        <div id="button">
                            <a href="<?php echo e(route('home')); ?>"><i class="fa-solid fa-house"></i></a>
                        </div>
                    </nav>
                    <div class="foto"><img src="<?php echo e($user['foto']); ?>"></div>
                </div>
                <div class="parag">
                    <p>
                        Benvenuto <strong><?php echo e($user['username']); ?></strong></br>
                        In questa sezione avrai la possiblità di accedere a tutte le canzoni di vari artisti per poterle salvare, mettere tra i preferiti e creare la tua playlist personalizzata; 
                    </p>
                </div>
                <form name='element' class='element' id='search'>
                    <label>
                        <input type='text' id='text' name='search' placeholder="Inserisci il titolo della canzone..">
                    </label>	

                    <label>
                        <input type='submit' id="send" value="Cerca">
                    </label> 
                    <article id="view" class="hidden"></article> 
                </form>  
            </div>
        </section>
    </body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw2/resources/views/search.blade.php ENDPATH**/ ?>