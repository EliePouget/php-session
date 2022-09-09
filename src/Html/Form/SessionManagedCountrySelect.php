<?php

declare(strict_types=1);

namespace Html\Form;

use Html\Form\CountrySelect;
use Service\Session;

class SessionManagedCountrySelect extends CountrySelect
{
    private const NAME = "COUNTRY" ;

    public function __construct(string $selected = "fr", string $firstOption = "Pays")
    {
        parent::__construct(self::NAME, $selected, $firstOption);
        Session::start();
    }
    public function saveSelectedIntoSession(): void
    {
        $_SESSION[self::NAME] = self::NAME;
    }
}
