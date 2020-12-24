<?php


namespace App\Repositories\Eloquent;


use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\NullDefaultSupportTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EloquentRepository
{
    use NullDefaultSupportTrait;

    /** @var Model */
    protected $model;
    protected $notNullable;
    protected $defaultValues;

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }
}