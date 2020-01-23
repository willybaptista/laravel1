<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tarefa;

class Tarefa extends Model
{    
    //protected $table = 'tarefas';
    //protected $primaryKey = 'id';
    //public $incrementing = true;
    //protected $keyType = 'string';

    public $timestamps = false;

    //const CREATED_AT = 'date_created';
    //const UPDATE_AT = 'date_updated';
}
