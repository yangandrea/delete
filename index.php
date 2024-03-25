<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once ("Classe.php");


$app = AppFactory::create();

$app->get('/alunni', function ($request,$response,$args)
{
    $classe = new Classe();
    $response->getBody()->write(json_encode($classe));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/alunni/{nome}', function ($request,$response,$args)
{
    $classe = new Classe();
    $alunno = $classe->getAlunno($args['nome']);
    if ($alunno !== null) {
        $response->getBody()->write(json_encode($alunno->jsonSerialize()));
    } else {
        $response->getBody()->write("Alunno non trovato");
    }
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/alunni', function ($request,$response,$args)
{
    $dati = json_decode($request->getBody()->getContents(), true);
    $classe = new Classe();
    $classe->addAlunno($dati['nome'], $dati['cognome'], $dati['eta']);
    $response->getBody()->write(json_encode($classe));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->put('/alunno/{nome}', function ($request,$response,$args)
{
    $dati = json_decode($request->getBody()->getContents(), true);
    $classe = new Classe();
    $alunno = $classe->getAlunno($args['nome']);
    if ($alunno !== null) {
        $alunno->setNome($dati['nome']);
        $alunno->setCognome($dati['cognome']);
        $alunno->setEta($dati['eta']);
        $response->getBody()->write(json_encode($classe));
    } else {
        $response->getBody()->write("Alunno non trovato");
    }
    return $response->withHeader('Content-Type', 'application/json');
});

$app->delete('/alunni/{nome}', function ($request,$response,$args)
{
    $classe = new Classe();
    if ($classe->deleteAlunno($args['nome'])) {
        $response->getBody()->write("Alunno eliminato");
    } else {
        $response->getBody()->write("Alunno non trovato");
    }
    return $response->withHeader('Content-Type', 'application/json');
});
$app->run();
