<?php

namespace App\Http\Controllers\Product;
use domain\Facades\Products\ProductFacade;

use App\Http\Controllers\ParentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProduCtcontroller extends ParentController
{
    public function index()
    {
        return view ('pages.product.index');
    }

    public function create()
    {
        return view ('pages.product.create');
    }

    public function store(Request $reqest)
    {
      
      ProductFacade::create($reqest->all());
      
      $response['alert-success'] = 'New Product Created Successfully';
      return redirect()->route('product.index')->with($response);
    }

    public function edit($id)
    {
    $response['product'] = ProductFacade::get($id);
    return view('pages.product.edit')->with($response);
    }

    public function update(Request $request, $id)
{
    
    ProductFacade::update(ProductFacade::get($id), $request->all());
    $response['alert-success'] = 'Product Updated Successfully';
    return redirect()->route('product.index')->with($response);
}
 
public function delete($id)
{
   ProductFacade::delete(ProductFacade::get($id));
}
}
