<?php

namespace App\Mircurius\Repositories\Country;


class EloquentCountryRepository implements CountryRepository
{
    public function perPage()
    {
        return config('frontend.country.perpage');
    }

    public function getModel()
    {
        $model = config('frontend.product.model');
        
        return new $model();
    }

    public function getProduct()
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
        return $this->getProduct()->latest()->paginate($this->perPage());
    }

    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getProduct()->where('title', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->orWhere('id', '=', $searchQuery)
            ->paginate($this->perPage());
    }

    public function findById($id)
    {
        return $this->getProduct()->find($id);
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getProduct()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function findByCategoryId($id)
    {
        return $this->getProduct()->where('category_id', (int)$id)->paginate($this->perPage());
    }


    public function findByProductId($id)
    {
        return $this->getProduct()->where('id', (int)$id)->get()->first();
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
