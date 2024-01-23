<?php

namespace App\Models;

use App\Enums\VacationStatus;
use App\Enums\VacationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;
    protected $casts = [
       'status'=>VacationStatus::class,
       'type'=>VacationType::class,
    ];

    protected $fillable=['user_id','to','from','type','status','note'];
    function user(){
        return $this->belongsTo(User::class);
    }
}
