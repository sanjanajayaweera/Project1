<?php


namespace domain\Services\Products;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Collection;
use infrastructure\Facades\ImageCropperFacade;

/**
 * Product Service
 * 
 * php version 8
 *
 * @product Service
 * @author   Spera Labs <janith@speralabs.com.au>
 * 
 * */
class ProductService
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * Get product ing using ID
     *
     * @param  int $id
     * @return Product
     */
    function get(int $id): ?Product
    {
        return $this->product->find($id);
    }
    /**
     * Get   using IDs
     *
     * @param  array $ids
     * @return Collection
     */
    function getByIds(array $ids = []): ?Collection
    {
        return $ids ? $this->product->getByIds($ids) : [];
    }

    /**
     * Get all product  
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        //Get all product
        return $this->product->all();
    }

    /**
     * Create product  
     *
     * @param  array $product
     * @return Product
     */
    public function create(array $product): Product
    {
        if (isset($product['image'])) {
            $image = ImageCropperFacade::up($product['image'], $product);
            $product['image_id'] = $image['data']->id;
        }
        return $this->make($product);

        


    }

    /**
     * make product  
     *
     * @param  array $product
     * @return Product
     */
    public function make(array $product): Product
    {
        return $this->product->create($product);
    }
    /**
     * Update product  
     *
     * @param  Product  $product
     * @param  array $data
     * @return void
     */
    public function update(Product $product, array $data): void
    {
        if (isset($data['image'])) {
            $image = ImageCropperFacade::up($data['image'], $data);
            $data['image_id'] = $image['data']->id;
        }
        
        //Update Theme object with given data
        $product->update($this->edit($product, $data));
    }

    /**
     * Edit product  
     *
     * @param  Product  $product
     * @param  array $data
     * @return array
     */
    protected function edit(Product $product, array $data): array
    {
        return array_merge($product->toArray(), $data);
    }

    /**
     * Delete product 
     * 
     * @param  Product $product
     * @return void
     */
    public function delete(Product $product): void
    {
        $product->delete();
    }

    
}