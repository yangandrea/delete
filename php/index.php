<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';

$app = AppFactory::create();

$app->get('/alunni', "AlunniController:index");
$app->get('/alunni/{id}', "AlunniController:trova");
$app->post('/alunni', "AlunniController:inserisci");
$app->put('/alunni/{id}', "AlunniController:aggiorna");
$app->delete('/alunni/{id}', "AlunniController:elimina");

$app->run();