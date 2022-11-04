<?php
    include('config.php');
    $forumController = new Controller\forumController;
    
    Router::get('/', function() use ($forumController){
        $forumController->home();
    });

    Router::get('/?',function($arr) use ($forumController){
        $forumController->topicos($arr['1']);
    });
    Router::get('/?/?',function($arr) use ($forumController) {
        $forumController->postSingle($arr);
    });
    
    if(Router::isExecuted() == false){
        die('nao existe');
    }
?>