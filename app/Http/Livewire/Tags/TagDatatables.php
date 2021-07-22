<?php

namespace App\Http\Livewire\Tags;

use Livewire\Component;
use App\Models\Tags\Tag;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Illuminate\Support\Facades\Config;


use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class TagDatatables extends LivewireDatatable


{ 
    public $model = Tag::class;

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

           Column::name('description')
                ->label('Description'),

            DateColumn::name('created_at')
                ->label('Creation Date'),


            Column::callback(['image.name'], function ($imageName) {
                    return  $this->imageView($imageName);
                })->label('Image'),

            Column::callback(['id'], function ($id) {
                    return view('pages.tag.components.action-btn', ['id' => $id]);
         })->label('Actions')

        ];
    }

    public function imageView($imageName)
    {
     return '<img  src="' . asset(Config::get('images.image_path') . 'thumb/50x50/' . $imageName) . '"alt="your image" />  </a>';
    }
}





  



