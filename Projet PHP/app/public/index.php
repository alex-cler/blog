<?php


session_start();

require __DIR__ . '/../vendor/autoload.php';


$comments = new \App\Manager\CommentManager();

$test = $comments->getAllComments();

print_r($test);



//$router = new \App\Fram\Router();