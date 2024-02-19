<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;
    public static $permissions = [
        'branch-show',
        'branch-store',
        'branch-update',
        'branch-delete',
    ];
    protected $fillable = ["name", "location"];
}
