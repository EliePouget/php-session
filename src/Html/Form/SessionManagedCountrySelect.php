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
        $this->setSelectedFromSession();
        $this->setSelectedFromRequest();
        $this->saveSelectedIntoSession();
    }
    public function saveSelectedIntoSession(): void
    {
        $_SESSION[self::NAME] = $this->getSelected();
    }

    public function setSelectedFromSession(): void
    {
        if (isset($_SESSION[self::NAME])) {
            $this->setSelected($_SESSION[self::NAME]);
        }
    }
}
