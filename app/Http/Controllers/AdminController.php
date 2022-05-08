<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Department;
use Session;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        $exists = Admin::where('email', $request->email)
                    ->where('password', $request->password)
                    ->exists();

        if($exists)
        {
            session()->put('admin_email', $request->email);
            return redirect('admin-homepage');
        } else {
            return redirect('admin')->with('status', 'Invalid Credentials');
        }                  
    }

    public function employees_listing()
    {
     
        $employee = Employee::all();
        return view('admin.employees_listing', ['data'=>$employee]);
    }

    public function department_listing()
    {
        $dept = Department::all();
        return view('admin.dept_listing', ['data'=>$dept]);
    }

    public function add_dept()
    {
        $employee = Employee::get(['id','name']);
        return view('admin.dept_add', ['data'=>$employee]);
    }

    public function post_department(request $request)
    {
        $dp = new Department;

        $dp->dept_name = $request->dept_name;
        $dp->dept_head = $request->dept_head;
        $dp->save();

        return redirect('all-department')->with('status','Department Added!');

    }

    public function assign_dept()
    {
        $dept = Department::all();
        $emp = Employee::all();

        return view('admin.assign_dept', ['dept'=>$dept, 'emp'=>$emp]);

    }

    public function get_emp($id)
    {
        // return \json_encode($id);
        // return $id;
        $dt = Employee::where('dept_id', $id)->get(['id','name']);
        $option = '';
        foreach($dt as $rows){
                $option .= "<option value='$rows->id'>".$rows->name."</option>";
        }
        return $option;
        
    }


}
