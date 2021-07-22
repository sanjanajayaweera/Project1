<?php


namespace domain\Services\Tags;

use App\Models\Tags\Tag;
use Illuminate\Database\Eloquent\Collection;
use infrastructure\Facades\ImageCropperFacade;

/**
 * Tag Service
 * 
 * php version 8
 *
 * @tag Service
 * @author   Spera Labs <janith@speralabs.com.au>
 * 
 * */
class TagService
{
    protected $tag;

    public function __construct()
    {
        $this->tag = new Tag();
    }

    /**
     * Get tag ing using ID
     *
     * @param  int $id
     * @return Tag
     */
    function get(int $id): ?Tag
    {
        return $this->tag->find($id);
    }
    /**
     * Get   using IDs
     *
     * @param  array $ids
     * @return Collection
     */
    function getByIds(array $ids = []): ?Collection
    {
        return $ids ? $this->tag->getByIds($ids) : [];
    }

    /**
     * Get all tag  
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all tag
        return $this->tag->all();
    }

    /**
     * Create tag  
     *
     * @param  array $tag
     * @return Tag
     */
    public function create(array $tag): Tag
    {
        if (isset($tag['image'])) {
            $image = ImageCropperFacade::up($tag['image'], $tag);
            $tag['image_id'] = $image['data']->id;
        }
        return $this->make($tag);

        


    }

    /**
     * make tag  
     *
     * @param  array $tag
     * @return Tag
     */
    public function make(array $tag): Tag
    {
        return $this->tag->create($tag);
    }
    /**
     * Update tag  
     *
     * @param  Tag  $tag
     * @param  array $data
     * @return void
     */
    public function update(Tag $tag, array $data): void
    {
        
        if (isset($tag['image'])) {
            $image = ImageCropperFacade::up($data['image'], $data);
            $data['image_id'] = $image['data']->id;
        }
        
        //Update Theme object with given data
        $tag->update($this->edit($tag, $data));
    }

    /**
     * Edit tag  
     *
     * @param  Tag  $tag
     * @param  array $data
     * @return array
     */
    protected function edit(Tag $tag, array $data): array
    {
        return array_merge($tag->toArray(), $data);
    }

    /**
     * Delete tag 
     * 
     * @param  Tag $tag
     * @return void
     */
    public function delete(Tag $tag): void
    {
        $tag->delete();
    }

    
}