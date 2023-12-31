<?php

declare(strict_types=1);

namespace Html;

class CountryFlag
{
    private string $code;
    private string $baseUrl;

    /**
     * @param string $code
     * @param string $baseUrl
     */
    public function __construct(string $code, string $baseUrl)
    {
        $this->code = $code;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }
    public function toHtml(): string
    {
        return <<<HTML
                <img src="/img/flags/{$this->getCode()}.png" alt="Flag {$this->getCode()}">
                HTML;
    }
}
