<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iteration extends Model
{

    protected $table = 'iteration';

    protected $fillable = ['user_quizz_id','order','date','note'];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
