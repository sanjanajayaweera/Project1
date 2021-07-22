<?php
/**
 * Author: Sahan Hasitha/(+94)77 2418695
 * Email: sahan@sperasoft.lk
 * File Name: SessionHandlerFacade.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */

namespace infrastructure\Facades;


use Illuminate\Support\Facades\Facade;
use infrastructure\FileService;

class FileFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return  FileService::class;
    }

} 