<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class Maincontroller extends Controller
{
    public function index()
    {
        return View('addEmployee');
    }
}
