<?php

namespace App\Filters\Dashboard\User;

use Closure;

class DepartmentFilter
{
    public function handle($query, Closure $next)
    {
        if (request()->filled('department_id') && request()->department_id != null) {
            $query->whereDepartment_id( request()->department_id);
        }
        return $next($query);
    }
}
