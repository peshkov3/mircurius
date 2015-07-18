<?php

namespace App\Mircurius\Repositories\Category;

use App\Mircurius\Repositories\Category;

class EloquentCategoryRepository implements CategoryRepository
{
    public function perPage()
    {
        return config('frontend.category.perpage');
    }

    public function getModel()
    {
        $model = config('frontend.category.model');
        
        return new $model;
    }

    public function getCategory()
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
        return $this->getCategory()->latest()->paginate($this->perPage());
    }

    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getCategory()->where('title', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->orWhere('id', '=', $searchQuery)
            ->paginate($this->perPage())
        ;
    }

    public function findById($id)
    {
        return $this->getCategory()->find($id);
    }

    public function findByRootId($id)
    {
        return $this->getCategory()->where('id', (int)$id)->get()->first();
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getCategory()->where($key, $operator, $value)->paginate($this->perPage());
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
