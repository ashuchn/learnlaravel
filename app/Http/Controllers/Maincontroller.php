<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Mail;
use Session;


class Maincontroller extends Controller
{
    public function index()
    {
        return View('addEmployee');
    }

    public function insert_employee(Request $request )
    {

        $random = rand(1000,9999999);
        
        $emp = new Employee;
        $emp->name = $request->name;
        $emp->password = $random;
        $emp->email = $request->email;
        $emp->mobile = $request->phone;
        $emp->save();

        $message = "Employee added";

        $mail = $this->password_mail($request->name, $request->email ,$random);
        $response = $mail->getData();
        
        if($response->response_code == 200){
            $message .= " & Mail sent.";
        }else{
            $message .= " & Mail not Sent";
        }

        return redirect('index')->with('status',$message);


    }

    public function password_mail($name, $email, $password)
    {
        $data = ['name'=>$name, 'email'=>$email , 'password'=>$password];
        $user['to'] = $email;

        $mail = Mail::send('mail_template', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject('New Password');
        });

        if($mail){
            return response()->json(
                [
                    "response_code" => 200,
                    "response_message" => "mail sent!"
                ], 200);
        }else{
            return response()->json(
                [
                    "response_code" => 404,
                    "response_message" => "mail not sent!"
                ], 200);
        }

    }

    public function employee_login(Request $request)
    {
        // $data = ['email' => $request->email, 'password'=>$request->password];
        $email = $request->email;
        $check = Employee::where('email', $request->email)->where('password',$request->password)->exists();
        // return $check;
        if($check)
        {
            session()->put('email',$email);
            // return view('emp_homepage', ['email'=>$email]);
            // print_r(session('data'));
            // echo session('email');
            // exit;
            return redirect('emp-homepage');
            

        }else{
            return redirect('index')->with('status_login', 'Invalid Credentials');
        }


       
    }


    public function employee_homepage()
    {

        if(!session('email'))
        {
            return redirect('index')->with('status_login', 'Not logged in');
        }

        $data = Employee::where('email')->get();
        return view('emp_homepage', ['data'=>$data]);
    }

    public function employee_logout()
    {
        Session::flush();
        return redirect('index')->with('status_login', 'Logged Out Successfully');
    }
    

}
