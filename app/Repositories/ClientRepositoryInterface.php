<?php


namespace App\Repositories;

use App\Models\Client;
use Illuminate\Http\Request;

interface ClientRepositoryInterface
{
    public function all($columns);

    public function add($attributes);

    public function delete($id);
}