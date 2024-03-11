<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once (__DIR__.'/../Classe.php');
class AlunniController
{
    function index(Request $request, Response $response, $args )
    {
        $classe = new Classe();
        $message = $classe->toHTML();
        $response->getBody()->write($message);
        return $response;
    }
    function alunno(Request $request, Response $response, $args )
    {
        $classe = new Classe();
        $alunno = $classe->getAlunno($args['nome']);
        if($alunno)
            $message = $alunno->toString();
        else
            $message = "<h1>Alunno non trovato</h1>";
        $response->getBody()->write($message);
        return $response;
    }
}