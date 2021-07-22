<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\ParentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends ParentController
{
public function index()
{
    return view ('pages.item.index');
}
}
