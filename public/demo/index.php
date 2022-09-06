<?php

declare(strict_types=1);


use Html\AppWebPage;

$webPage = new AppWebPage('Gestion des données de session - démonstration');

$webPage->appendContent(
    <<<HTML
    <ul>
        <li><a href="write.php">Écriture de la donnée</a>
        <li><a href="read.php">Lecture de la donnée</a>
        <li><a href="delete.php">Effacement de la donnée</a>
    </ul>
HTML
);

echo $webPage->toHTML();
