<?php

namespace domain\Facades\Categories;

use domain\Services\Categories\CategoryService;
use Illuminate\Support\Facades\Facade;


class CategoryFacade extends Facade
{    
    /**
     * getFacadeAccessor
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return CategoryService::class;
    }

    
}