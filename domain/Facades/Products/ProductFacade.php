<?php

namespace domain\Facades\Products;

use domain\Services\Products\ProductService;
use Illuminate\Support\Facades\Facade;


class ProductFacade extends Facade
{    
    /**
     * getFacadeAccessor
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return ProductService::class;
    }

    
}