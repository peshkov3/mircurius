<?php

namespace App\Mircurius\Repositories\Country;

use App\Mircurius\Repositories\Repository;

interface CountryRepository extends Repository
{
    public function getProduct();
    public function findByCategoryId($id);
    public function findByProductId($id);

}
