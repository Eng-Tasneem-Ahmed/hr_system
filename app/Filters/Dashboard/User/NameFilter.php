<?php

namespace App\Filters\Dashboard\User;

use Closure;

class NameFilter
{
    public function handle($query, Closure $next)
    {
        if (request()->filled('name') && request()->input('name') != null) {
            $query->where('name', 'like', '%' . request()->input('name') . '%');
        }
        return $next($query);
    }
}
