<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tb_pessoa';
    protected $primaryKey = 'cd_pessoa';
    public $timestamps = false;
}
