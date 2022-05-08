<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'tbl_employee';

    protected $fillables = ['id', 'name', 'password','mobile', 'email', 'dept_id'];

    protected $primaryKey = 'id';

    // public $timestamps = true;

    protected $nullables = [ 'dept_id' ];

}
