<?php

namespace App\Mircurius\Repositories\Order;


class EloquentOrderRepository implements OrderRepository
{
    public function perPage()
    {
        return config('frontend.order.perpage');
    }

    public function getModel()
    {
        $model = config('frontend.order.model');
        
        return new $model();
    }

    public function getOrder()
    {
        return $this->getModel();
    }

    public function allOrSearch($searchQuery = null)
    {
        if (is_null($searchQuery)) {
            return $this->getAll();
        }

        return $this->search($searchQuery);
    }

    public function getAll()
    {
        return $this->getOrder()->latest()->paginate($this->perPage());
    }

    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getOrder()->where('title', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->orWhere('id', '=', $searchQuery)
            ->paginate($this->perPage());
    }

    public function findById($id)
    {
        return $this->getOrder()->find($id);
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getOrder()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function findByCategoryId($id)
    {
        return $this->getOrder()->where('category_id', (int)$id)->paginate($this->perPage());
    }


    public function findByOrderId($id)
    {
        return $this->getOrder()->where('id', (int)$id)->get()->first();
    }


    public function delete($id)
    {
        $article = $this->findById($id);

        if (!is_null($article)) {
            $article->delete();
            return true;
        }

        return false;
    }

    public function create(array $data)
    {
        
        return $this->getModel()->create($data);
    }
}
