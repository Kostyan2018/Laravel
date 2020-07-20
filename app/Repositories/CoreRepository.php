<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models;

/**
 * Class CoreRepository
 * 
 * @package App\Repositories
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;
    
    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
    // $this->model = app('App\Models\BlogCategory');

    // $this->model = new $this->getModelClass();
       $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}