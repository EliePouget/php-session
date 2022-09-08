<?php

declare(strict_types=1);
namespace Service;
class Session
{
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            if (headers_sent() == true) {
                throw new \Service\Exception\SessionException('Entête non modifiable');
            }
            session_start();
        } elseif (session_status() == PHP_SESSION_DISABLED) {
            throw new \Service\Exception\SessionException('Session désactiver');
        } elseif (session_status() != PHP_SESSION_ACTIVE) {
            throw new \Service\Exception\SessionException('Erreur inconnu');
        }
    }
}
