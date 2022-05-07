<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'tbl_employee';

    protected $fillables = ['id', 'name', 'mobile', 'email', 'dept_id'];

    protected $primartKey = 'id';

    public $timestamps = true;

}
