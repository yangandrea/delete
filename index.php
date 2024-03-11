<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ . '/controller/AlunniController.php';
require_once  __DIR__ . '/controller/ApiAlunniController.php';


$app = AppFactory::create();

$app->get('/alunni', 'AlunniController:index');
$app->get('/alunni/{nome}', 'AlunniController:alunno');
$app->get('/json/alunni','ApiAlunniController:all' );
$app->get('/json/alunni/{nome}','ApiAlunniController:search' );

$app->run();
