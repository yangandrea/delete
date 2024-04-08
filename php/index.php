GRANT ALL PRIVILEGES ON *.* TO 'root'@'172.19.0.5' IDENTIFIED BY 'password' WITH GRANT OPTION;
FLUSH PRIVILEGES;
<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';

$app = AppFactory::create();

$app->get('/alunni', "AlunniController:index");

$app->run();