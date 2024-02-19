<?php

namespace App\Enums;

enum VacationStatus: int
{
    case PENDING = 1;
    case ACCEPTED = 2;
    case REJECTED = 3;
    function color(){
        return match ($this) {
           self::PENDING  =>"bg-warning" ,
           self::ACCEPTED     =>"bg-success" ,
           self::REJECTED =>"bg-danger" ,
       };
     }


     public static function getValues()
     {
         return [
             self::PENDING ->value,
             self::ACCEPTED ->value ,
             self::REJECTED->value
         ];
         
     }
}
