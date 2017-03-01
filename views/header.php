<!DOCTYPE html>
<!--
 Michał Błaszczyk
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="<?php echo $GLOBALS['base_url']; ?>public/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!--Ikonki-->
        <link rel="stylesheet" href="<?php echo $GLOBALS['base_url'] . 'public/fonts/font-awesome.min.css'; ?>">
        <!--Styl-->
        <link rel="stylesheet" href="<?php echo $GLOBALS['base_url'] . 'public/css/style.css'; ?>">
        
    </head>
    <body>
            <nav style="padding-left: 15px; padding-right: 15px;" class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $GLOBALS['base_url']; ?>">Strona główna </a>
                </div>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $GLOBALS['base_url']; ?>articles/page">Artykuły </a></li>
                        <li><a href="<?php echo $GLOBALS['base_url']; ?>contact">Kontakt </a></li>
                        <?php
                            if(Session::get('rank') == 1){
                                echo '<li><a href="'. $GLOBALS['base_url'] .'panel">Panel administracyjny </a></li>';
                            }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if(!Session::get('id_user')){
                               echo '
                                <li><a href = "'. $GLOBALS['base_url'] .'login">Logowanie </a></li>
                                <li><a href = "'. $GLOBALS['base_url'] .'register">Rejestracja </a></li>'; 
                            }
                            else{
                                echo '<li><a href = "'. $GLOBALS['base_url'] .'logout">Wyloguj </a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </nav>
