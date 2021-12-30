<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'tb_conta';
    protected $primaryKey = 'cd_conta';
    public $timestamps = false;
}
