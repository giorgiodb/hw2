<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Record</title>
        <meta charset="utf-8">
        <link rel="icon" href="immagini/disco.png" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo e(url('css/login.css')); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Palette+Mosaic&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas Neue" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela Gothic One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        <header class="flex-tot">
            <div class="flex-img">
                <div class="title">
                    RECORD
                </div>
                <h2>Tutti gli artisti che desideri</h2>
                <h3>Quando vorrai e ovunque vorrai</h3>
                <h4>Crea la tua playlist e ascolta</h4>
            </div>
            <div class="flex">
                <div class="flex-form">
                    <form id=form name='nome_form' method='post' action="<?php echo e(route('log_form')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if($errore): ?>
                            <span class='error_s'>Username e/o Password errati</span>
                        <?php endif; ?>
                        <p>
                            <label>
                                Nome utente <input type='text' name='username' class="det">
                            </label>
                        </p>

                        <p>
                            <label>
                                Password <input type='password' name='password' class="det">
                            </label>
                        </p>

                        <div class="details">
                            <input type="submit" value="Accedi">
                        </div>

                        <div class="signup">
                            Non hai un account? <a href="<?php echo e(route('signup')); ?>">Iscriviti</a>
                        </div>
                    </form>
                </div>
                <div class="flex-contact">
                    <div class="tit">
                        Follow us
                    </div>
                    <div class="parag">
                        Attraverso le icone che vedete sotto sarete in grado di contattarci per qualsiasi dubbio:
                        FAQ, bug e sicurezza personale;
                    </div>
                    <div class="icons">
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href="mailto:giorgiodb2000@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw2/resources/views/login.blade.php ENDPATH**/ ?>