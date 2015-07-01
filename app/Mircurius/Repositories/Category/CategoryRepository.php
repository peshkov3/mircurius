<?php

namespace App\Mircurius\Repositories\Category;

use App\Mircurius\Repositories\Repository;

interface CategoryRepository extends Repository
{
    public function getCategory();
}
