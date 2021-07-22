<?php

namespace App\Http\Controllers\Tag;
use domain\Facades\Tags\TagFacade;
use App\Http\Controllers\ParentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends ParentController
{
    public function index()
    {
        return view ('pages.tag.index');
    }

    public function create()
    {
        return view ('pages.tag.create');
    }

    public function store(Request $reqest)
    {
      
      TagFacade::create($reqest->all());
      
      $response['alert-success'] = 'New Tag Created Successfully';
      return redirect()->route('tag.index')->with($response);
    }

    public function edit($id)
    {
    $response['tag'] = TagFacade::get($id);
    return view('pages.tag.edit')->with($response);
    }

    public function update(Request $request, $id)
{
    
    TagFacade::update(TagFacade::get($id), $request->all());
    $response['alert-success'] = 'Tag Updated Successfully';
    return redirect()->route('tag.index')->with($response);
}
 
public function delete($id)
{
   TagFacade::delete(TagFacade::get($id));
}

}
