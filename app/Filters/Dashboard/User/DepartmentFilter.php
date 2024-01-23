<?php

namespace App\Filters\Dashboard\User;

use Closure;

class DepartmentFilter
{
    public function handle($query, Closure $next)
    {
        if (request()->filled('department_id') && request()->input('department_id') != null) {
            $query->where('department_id', 'like', '%' . request()->input('department_id') . '%');
        }
        return $next($query);
    }
}
