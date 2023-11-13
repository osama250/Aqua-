<?php
   namespace App\Traits;

   trait TestTrait {

     public function getData($model) {
        $data  = $model::all();
        return $data;
     }

 }
