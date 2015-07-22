<?php

namespace App\Mircurius\Repositories\User;


class EloquentUserRepository implements UserRepository
{
    public function perPage()
    {
        return config('frontend.user.perpage');
    }

    public function getModel()
    {
        $model = config('frontend.user.model');
        
        return new $model();
    }

    public function getUser()
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
        return $this->getUser()->latest()->paginate($this->perPage());
    }

    public function search($searchQuery)
    {
        $search = "%{$searchQuery}%";
        
        return $this->getUser()->where('title', 'like', $search)
            ->orWhere('body', 'like', $search)
            ->orWhere('id', '=', $searchQuery)
            ->paginate($this->perPage());
    }

    public function findById($id)
    {
        return $this->getUser()->find($id);
    }

    public function findBy($key, $value, $operator = '=')
    {
        return $this->getUser()->where($key, $operator, $value)->paginate($this->perPage());
    }

    public function findByCategoryId($id)
    {
        return $this->getUser()->where('category_id', (int)$id)->paginate($this->perPage());
    }


    public function findByUserId($id)
    {
        return $this->getUser()->where('id', (int)$id)->get()->first();
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
