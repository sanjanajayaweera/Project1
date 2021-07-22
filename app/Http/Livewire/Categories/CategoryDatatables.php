<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Categories\Category;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;

use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CategoryDatatables extends LivewireDatatable
{
    public $model = Category::class;

    public $hideable = 'select';
    public $exportable = true;

   public function columns()
   {
       return [
           NumberColumn::name('id')->searchable()
           ->label('ID')
           ->sortBy('id'),

           Column::name('title')->searchable()
                ->label('Title'),

           DateColumn::name('created_at')
                ->label('Creation Date'),
            
           Column::callback(['id'], function ($id) {
                    return view('pages.category.components.action-btn', ['id' => $id]);
         })->label('Actions')
           

       ];
   }
}




