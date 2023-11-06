<?php
    if(isset($_GET['page']) AND !empty($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page= 'form';
    }
    $allpages = scandir('controllers/');
    if(in_array($page. '.php', $allpages)){
        // inclusion de la page
        include_once 'controllers/'. $page.'.php';
        // include_once 'models/'. $page.'.php';
        include_once 'views/'. $page.'.php';
    }else{
        //envoyer un message d'erreur
        echo "erreur 404";
    }
?>