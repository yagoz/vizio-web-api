<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/db.php';

use Symfony\Component\HttpFoundation\Request;

$sc = include __DIR__.'/../src/container.php';
$sc->setParameter('routes', include __DIR__.'/../src/routes.php');

$request = Request::createFromGlobals();

$response = $sc->get('framework')->handle($request);

$response->send();