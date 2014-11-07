<?php

require_once __DIR__ . '/config/config.php';
require_once ROOT_PATH . '/vendor/autoload.php';

use Slim\Slim;
use Slim\Route;

$app = new Slim(array(
    'debug' => true,
    'templates.path' => ROOT_PATH . '/templates',
    'mode' => 'development',
    'log.enabled' => true
));

$oDB = new PDO('sqlite:' . SQLITE_FILE);
$oDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ------- ROUTE SETTINGS -------

Route::setDefaultConditions(array(
    'id' => '\d+',
    'itemId' => '\d+'
));

// ------- HOOKS -------
$app->hook('slim.before.dispatch', function() use ($app) {
    if (!$app->request->isAjax()) {
        $app->render('header.php');
    }
});

$app->hook('slim.after.dispatch', function() use ($app) {
    if (!$app->request->isAjax()) {
        $app->render('footer.php');
    }
});

// ------- ITEMS -------
$app->get('/', function() {});

$app->get('/items', function() use ($app, $oDB) {
    $stm = $oDB->query("SELECT * FROM item");
    $items = $stm->fetchall(\PDO::FETCH_OBJ);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', "application/json");
    $app->response->setBody(json_encode($items));
});

$app->post('/items', function() use ($app, $oDB) {
    $body = json_decode($app->request->getBody());
    $stm = $oDB->prepare("INSERT INTO item VALUES (NULL, ?)");
    $stm->execute([$body->name]);
    $id = $oDB->lastInsertId();

    $app->response->setStatus(201);
    $app->response->headers->set('Location', '/items/' . $id);
});

$app->get('/items/:id', function($id) use ($app, $oDB) {
    $stm = $oDB->prepare("SELECT * FROM item WHERE id = ?");
    $stm->execute([$id]);
    $item = $stm->fetch(\PDO::FETCH_OBJ);

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', "application/json");
    $app->response->setBody(json_encode($item));
});

$app->put('/items/:id', function($id) use ($app, $oDB) {
    $body = json_decode($app->request->getBody());
    $stm = $oDB->prepare("UPDATE item SET name = ? WHERE id = ?");
    $stm->execute([$body->name, $id]);

    $app->response->setStatus(204);
});

$app->delete('/items/:id', function($id) use ($app, $oDB) {
    $stm = $oDB->prepare("DELETE FROM item WHERE id = ?");
    $stm->execute([$id]);

    $app->response->setStatus(200);
});

$app->run();