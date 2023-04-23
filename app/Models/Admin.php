<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Admin extends User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope('role', function (Builder $builder) {
            $builder->whereRole('admin');
        });

        static::creating(function ($model) {
            $model->forceFill([
                'role' => 'admin',
            ]);
        });
    }

}
