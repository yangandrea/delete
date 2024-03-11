<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once (__DIR__.'/../Classe.php');

class ApiAlunniController
{
    function all(Request $request, Response $response, $args)
    {
        $classe = new Classe();
//        $message = $classe->toJSON();
        $response->getBody()->write(json_encode($classe));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
    function search(Request $request, Response $response, $args)
    {
        $classe = new Classe();
        $alunno = $classe->getAlunno($args['nome']);
        if($alunno)
            $message = $alunno->toString();
        else
            $message = "<h1>Alunno non trovato</h1>";
        $response->getBody()->write(json_encode($message));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}