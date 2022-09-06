<?php

declare(strict_types=1);

use Html\AppWebPage;
use Service\Session;

Session::start();

$_SESSION['MA_DONNEE_DE_SESSION'] = "Je suis stockée sur le serveur";

$webPage = new AppWebPage('Écriture dans les données de session');

$webPage->appendContent('<p>Donnée de session écrite');

echo $webPage->toHTML();
