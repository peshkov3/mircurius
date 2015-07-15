<?php

namespace App\Mircurius\Repositories\Brand;

use App\Mircurius\Repositories\Category;

class EloquentBrandRepository implements BrandRepository
{
    public function perPage()
    {
        return config('frontend.brand.perpage');
    }

    public function getModel()
    {
        $model = config('frontend.brand.model');
        
        return new $model;
    }

    public function getBrand()
    {
        return $this->getModel()->onlyPost();
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
        return $this->getBrand()->latest()->paginate($this->perPage());
    }

    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getBrand()->where('title', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->orWhere('id', '=', $searchQuery)
            ->paginate($this->perPage())
        ;
    }

    public function findById($id)
    {
        return $this->getBrand()->find($id);
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getBrand()->where($key, $operator, $value)->paginate($this->perPage());
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
