<?php

namespace App\Services;

/**
 * Внедрение сервиса публикации 
 * 
 */
trait PublicationServiceInit
{
    /**
     * Сервис публикации
     * 
     * @var PublicationService
     */
    protected $ps;

    /**
     * Инициализация 
     * 
     */
    public function initPublicationService()
    {
        $this->ps = resolve('App\Services\PublicationService');
    }

}