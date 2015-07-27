<?php

namespace App\Mircurius\Repositories\Order;

use App\Mircurius\Repositories\Repository;

interface OrderRepository extends Repository
{
    public function getOrder();
    public function findByCategoryId($id);
    public function findByOrderId($id);

}
