<?php

declare(strict_types=1);

use Html\AppWebPage;
use Html\Form\SessionManagedCountrySelect;
use Html\CountryFlag;

$webPage = new AppWebPage('Country selector');

$select = new SessionManagedCountrySelect('country');

$flags = new CountryFlag($select->getSelected(), "http://localhost:8000/flags.php");
$webPage->appendContent(
    <<<HTML
    <form class="country-selector">
        {$flags->toHtml()}
        {$select->toHtml()}
        <input type="submit" value="Choisir">
    </form>
    HTML
);

echo $webPage->toHTML();
