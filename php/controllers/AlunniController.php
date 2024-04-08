<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AlunniController
{
    public function index(Request $request, Response $response, $args)
    {
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("SELECT * FROM alunni");
        $results = $result->fetch_all(MYSQLI_ASSOC);
        $response->getBody()->write(json_encode($results));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
    public function trova(Request $request, Response $response, $args)
{
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("SELECT * FROM alunni WHERE id = '". $args['id'] . "'");
        $results = $result->fetch_all(MYSQLI_ASSOC);
        $response->getBody()->write(json_encode($results));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
    public function inserisci(Request $request, Response $response, $args)
    {
        $body = json_decode($request->getBody()->getContents(), true);
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("INSERT INTO alunni (nome, cognome) VALUES ('" . $body['nome'] . "', '" . $body['cognome'] . "')");
        $response->getBody()->write(json_encode($result));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    public function aggiorna(Request $request, Response $response, $args)
    {
        $body = json_decode($request->getBody()->getContents(), true);
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("UPDATE alunni SET nome = '" . $body['nome'] . "', cognome = '" . $body['cognome'] . "' WHERE id = '" . $args['id'] . "'");
        $response->getBody()->write(json_encode($result));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    public function elimina(Request $request, Response $response, $args)
    {
        $mysqli_connection = new MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
        $result = $mysqli_connection->query("DELETE FROM alunni WHERE id = '" . $args['id'] . "'");
        $response->getBody()->write(json_encode($result));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
}