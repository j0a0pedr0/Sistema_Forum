<?php
    define('INCLUDE_PATH','http://localhost/Desenvolvimento_Web_completo/01-Projeto-Forum/');

    //Carregamento de classes dinamicas
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };
    spl_autoload_register($autoload);


    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','forum');
?>