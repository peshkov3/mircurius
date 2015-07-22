<?php

namespace App\Mircurius\Repositories\User;

use App\Mircurius\Repositories\Repository;

interface UserRepository extends Repository
{
    public function getUser();
    public function findByCategoryId($id);
    public function findByUserId($id);

}
