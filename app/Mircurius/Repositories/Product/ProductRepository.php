<?php

namespace App\Mircurius\Repositories\Product;

use App\Mircurius\Repositories\Repository;

interface ProductRepository extends Repository
{
    public function getProduct();
}
