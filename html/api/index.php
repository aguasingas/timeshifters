<?php
require_once __DIR__.'/../../vendor/autoload.php';

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Request;

$app->before(function (Request $request) {
  if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
    $data = json_decode($request->getContent(), true);
    $request->request->replace(is_array($data) ? $data : array());
  }
});

$app->post('/mock/friends', function (Request $request) use ($app) {
  $path = __DIR__ . '/../../assets/friends.json';
  $friends = file_get_contents($path);
  return $friends;
});

$app->run();