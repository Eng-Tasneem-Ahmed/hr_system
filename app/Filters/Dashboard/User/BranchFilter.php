<?php

namespace App\Filters\Dashboard\User;

use Closure;

class BranchFilter
{
    public function handle($query, Closure $next)
    {
        if (request()->filled('branch_id') && request()->branch_id != null) {
            $query->whereBranch_id(request()->branch_id);
        }
        return $next($query);
    }
}
