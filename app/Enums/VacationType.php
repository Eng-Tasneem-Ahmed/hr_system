<?php

namespace App\Enums;

enum VacationType: int
{
   case SICK=1;
   case ANNUL=2;
   case PAID=3;

   function color(){
      return match ($this) {
         self::SICK   =>"bg-danger" ,
         self::ANNUL     =>"bg-primary" ,
         self::PAID =>"bg-info" ,
     };
   }
   public static function all(): array
   {
       return [
           self::SICK,
           self::PAID,
           self::ANNUL,
       ];
   }
  
}
