<?php

namespace App\Repositories\Interfaces;

use App\User;

interface UserRepositoryInterface
{
    public function all();

    public function except(array $ids);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete(User $user);

    public function findById($id);
}
