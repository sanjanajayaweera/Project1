<?php


namespace domain\Services\Categories;

use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Category Service
 * 
 * php version 8
 *
 * @category Service
 * @author   Spera Labs <janith@speralabs.com.au>
 * 
 * */
class CategoryService
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    /**
     * Get category ing using ID
     *
     * @param  int $id
     * @return Category
     */
    function get(int $id): ?Category
    {
        return $this->category->find($id);
    }
    /**
     * Get   using IDs
     *
     * @param  array $ids
     * @return Collection
     */
    function getByIds(array $ids = []): ?Collection
    {
        return $ids ? $this->category->getByIds($ids) : [];
    }

    /**
     * Get all category  
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all category
        return $this->category->all();
    }

    /**
     * Create category  
     *
     * @param  array $category
     * @return Category
     */
    public function create(array $category): Category
    {
        
        return $this->make($category);
    }

    /**
     * make category  
     *
     * @param  array $category
     * @return Category
     */
    public function make(array $category): Category
    {
        return $this->category->create($category);
    }
    /**
     * Update category  
     *
     * @param  Category  $category
     * @param  array $data
     * @return void
     */
    public function update(Category $category, array $data): void
    {
        //Update Theme object with given data
        $category->update($this->edit($category, $data));
    }

    /**
     * Edit category  
     *
     * @param  Category  $category
     * @param  array $data
     * @return array
     */
    protected function edit(Category $category, array $data): array
    {
        return array_merge($category->toArray(), $data);
    }

    /**
     * Delete category 
     * 
     * @param  Category $category
     * @return void
     */
    public function delete(Category $category): void
    {
        $category->delete();
    }
}