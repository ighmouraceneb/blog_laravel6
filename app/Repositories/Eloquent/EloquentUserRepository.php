<?php

namespace App\Repositories\Eloquent;

use App\ {
    Repositories\RepositoryAbstract,
    Repositories\UserRepository,
    User
};

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    public function model()
    {
        return User::class;//'App\User.php
    }
}

