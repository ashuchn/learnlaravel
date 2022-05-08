<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'tbl_department';
    protected $fillables = ['dept_name','dept_head'];
    public $timestamps = true;
}
