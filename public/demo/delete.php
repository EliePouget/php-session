<?php

declare(strict_types=1);

use Html\AppWebPage;
use Service\Session;

Session::start();

$webPage = new AppWebPage('Effacement des données de session');

if (isset($_SESSION['MA_DONNEE_DE_SESSION'])) {
    unset($_SESSION['MA_DONNEE_DE_SESSION']);
    $webPage->appendContent('<p>Donnée en session effacée');
} else {
    $webPage->appendContent('<p>Pas de donnée en session');
}

echo $webPage->toHTML();
