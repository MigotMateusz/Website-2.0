<?php 
    define('WP_USE_THEMES', false);
    require('blog/wp-blog-header.php');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160811020-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-160811020-1');

    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Mateusz Migot</title>
</head>

<body class="text-center">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand disabled">Mateusz Migot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/MigotMateusz" target="_blank">Moje projekty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog/">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt">Kontakt</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <main role="main">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1>M a t e u s z M i g o t</h1>
                    <p class="lead">Student 2 roku informatyki. W wolnych chiwlach tworzę własne projekty.</p>
                </div>
            </section>
            <div class="container">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Ostatnie projekty</h1>
                        <p class="lead">
                            <dl class="row">
                                <dt class="col-sm-3"><a href="https://github.com/MigotMateusz/Personal-Website" target="_blank">Osobista strona internetowa</a></dt>
                                <dd class="col-sm-9">Strona na której umieszczne będą informacje związane z projektami, a także będzie prowadzony blog.</dd>
                                <dt class="col-sm-3"><a href="https://github.com/MigotMateusz/Test_1" target="_blank">Planer treningowy</a></dt>
                                <dd class="col-sm-9">Aplikacja mobilna na platformę android, służąca do tworzenia spersonalizowanych treningów</dd>
                                <dt class="col-sm-3"><a href="https://github.com/MigotMateusz/Test_1" target="_blank">Organizer osobisty</a></dt>
                                <dd class="col-sm-9">Kalendarz z funkcjami menadżera zadań i zarządzania projektami</dd>
                            </dl>
                        </p>
                    </div>
                </div>
                <div class="album">
                    <div class="container">
                        <h1 class="display-4">Blog</h1>
                        <div class="row">
                            <?php
                                $number_of_posts = 3;
                                $args = array( 'numberposts' => $number_of_posts );
                                $recent_posts = wp_get_recent_posts( $args );
                                foreach( $recent_posts as $recent_post ){
                                    echo '<div class="col-md-4">
                                            <div class="card mb-4 box-shadow">
                                                <div class="card-body">
                                                    <h5>'.$recent_post['post_title'].'</h5>
                                                    <p class="card-text">'.$recent_post['post_excerpt'].'</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-light">
                                                                <a href="'.get_post_permalink( $recent_post['ID'], false, false ).'">View</a>
                                                            </button>
                                                        </div>';
                                        echo '<small class="text-muted">'.$recent_post['post_date'].'</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
	                           }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="jumbotron text-center social">
            <h3 class="py-3">Stay connected</h3>
            <div class="col-md-12">
                <a href="https://www.facebook.com/Migot.Mateusz" target="_blank" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://github.com/MigotMateusz" target="_blank" class="btn-social btn-github"><i class="fa fa-github"></i></a>
                <!--<a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-instagram"><i class="fa fa-instagram"></i></a>-->
                <a href="http://linkedin.com" target="_blank" class="btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="https://twitter.com/MatiMigot" target="_blank" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="kontakt" target="_blank" class="btn-social btn-email"><i class="fa fa-envelope"></i></a>
                <!--<a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-youtube"><i class="fa fa-youtube"></i></a>-->
            </div>
        </div>
        <footer class="mastfoot mt-auto">
            <div class="row">
                <div class="col-6 col-md"><a class="disabled" href="portfolio">Strona główna</a></div>
                <div class="col-6 col-md"><a class="teext" href="https://github.com/MigotMateusz" target="_blank">Moje projekty</a></div>
                <div class="col-6 col-md"><a class="teext" href="blog/">Blog</a></div>
                <div class="col-6 col-md"><a class="teext" href="kontakt">Kontakt</a></div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
