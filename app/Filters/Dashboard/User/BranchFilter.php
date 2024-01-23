<?php

namespace App\Filters\Dashboard\User;

use Closure;

class BranchFilter
{
    public function handle($query, Closure $next)
    {
        if (request()->filled('branch_id') && request()->input('branch_id') != null) {
            $query->where('branch_id', 'like', '%' . request()->input('branch_id') . '%');
        }
        return $next($query);
    }
}
