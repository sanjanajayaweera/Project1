<?php

namespace App\Http\Controllers\Category;

use domain\Facades\Categories\CategoryFacade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends ParentController
{
    public function index()
    {
        return view ('pages.category.index');
    }

    public function create()
    {
        return view ('pages.category.create');
    }

    public function store(Request $reqest)
    {
      
      CategoryFacade::create($reqest->all());
      
      $response['alert-success'] = 'New Category Created Successfully';
      return redirect()->route('category.index')->with($response);
    }


     public function edit($id)
    {
    $response['category'] = CategoryFacade::get($id);
    return view('pages.category.edit')->with($response);
    }


    public function update(Request $request, $id)
{
    
    CategoryFacade::update(CategoryFacade::get($id), $request->all());
    $response['alert-success'] = 'Category Updated Successfully';
    return redirect()->route('category.index')->with($response);
}

public function delete($id)
{
    CategoryFacade::delete(CategoryFacade::get($id));
}


}
