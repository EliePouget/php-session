<?php

declare(strict_types=1);

use Html\AppWebPage;
use Service\Session;

Session::start();

$webPage = new AppWebPage('Lecture des données de session');

if (isset($_SESSION['MA_DONNEE_DE_SESSION'])) {
    $webPage->appendContent("<p>Donnée en session : {$_SESSION['MA_DONNEE_DE_SESSION']}");
} else {
    $webPage->appendContent('<p>Pas de donnée en session');
}

echo $webPage->toHTML();
