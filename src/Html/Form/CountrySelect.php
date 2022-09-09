<?php

declare(strict_types=1);

namespace Html\Form;

use Database\MyPdo;
use Entity\Collection\CountryCollection;
use PDO;

class CountrySelect
{
    private string $name;
    private string $selected;
    private string $firstOption;

    /**
     * @param string $name
     * @param string $selected
     * @param string $firstOption
     */
    public function __construct(string $name, string $selected = "fr", string $firstOption = "Pays")
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->firstOption = $firstOption;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSelected(): string
    {
        return $this->selected;
    }

    /**
     * @param string $selected
     */
    public function setSelected(string $selected): void
    {
        $this->selected = $selected;
    }

    /**
     * @return string
     */
    public function getFirstOption(): string
    {
        return $this->firstOption;
    }

    /**
     * @param string $firstOption
     */
    public function setFirstOption(string $firstOption): void
    {
        $this->firstOption = $firstOption;
    }
    public function toHtml(): string
    {
        $countries = CountryCollection::findAll();
        $first = $this->getFirstOption();
        $res =<<<HTML
                <select name=pays id=name>
                    <option value=''>'$first'</option>
        HTML;
        foreach ($countries as $country) {
            $code = $country->getCode();
            $name = $country->getName();
            if ($this->getSelected()==$code) {
                $res .= <<<HTML
                <option selected value='$code'>$name</option>
            HTML;
            } else {
                $res .= <<<HTML
                <option value='$code'>$name</option>
            HTML;
            }
        }
        $res .= <<<HTML
        </select>
        HTML;
        return $res;
    }
    public function setSelectedFromRequest(): void
    {
        $this->setSelected($_REQUEST['pays']);
        if ($_REQUEST['pays']!=$this->getName() || $_REQUEST[$this->getName()] == "") {
            $this->setSelected('fr');
        }
    }
}
