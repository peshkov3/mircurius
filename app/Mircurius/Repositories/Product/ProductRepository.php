<?php

namespace App\Mircurius\Repositories\Product;

use App\Mircurius\Repositories\Repository;

interface ProductRepository extends Repository
{
    public function getProduct();
    public function findByCategoryId($id);
    public function findByProductId($id);

}
