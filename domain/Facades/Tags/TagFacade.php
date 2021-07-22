<?php

namespace domain\Facades\Tags;

use domain\Services\Tags\TagService;
use Illuminate\Support\Facades\Facade;


class TagFacade extends Facade
{    
    /**
     * getFacadeAccessor
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return TagService::class;
    }

    
}