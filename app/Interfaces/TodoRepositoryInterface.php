<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

    interface TodoRepositoryInterface{


        public function findAll();
        public function save(Model $model);
        public function findById(int $id);
    }

?>