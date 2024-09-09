<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Client\Customer;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function login(){
      
        return view('admin.login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function store(){
        return view('admin.register');
    }
    public function adminstore(Request $request){
       
            // Validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:4|confirmed',
            ];
    
            // Custom error messages
            $messages = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'email.unique' => 'Email is already taken',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 8 characters',
                'password.confirmed' => 'Passwords do not match',
            ];
    
            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // If validation passes, create the user
            // You can use the User model for saving the user data to the database
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
    
            // Redirect to a success page or wherever you want
            return redirect()->route('login')->with('success', 'Registration successful!');
        }

        public function adminLogin(Request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            // Retrieve the user by email
            $user = User::where('email', $request->email)->first();
           // Log::info('User Retrieved: ', ['user' => $user]);
        
            // Check if user exists and if the password matches
            if ($user && Hash::check($request->password, $user->password)) {
                // Log the user in
                Auth::login($user);
              //  Log::info('User Authenticated: ', ['user' => $user]);
                
                // Authentication passed, redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            }
        
            // Authentication failed, redirect back to the login page with an error message
            // Log::info('Authentication Failed');
            return redirect()->route('login')->with('error', 'Invalid credentials.');

    }
    public function logout(Request $request)
    {
        Auth::logout(); // This will log out the user
        
        // For session based logout, you can also use:
        // $request->session()->flush();
        
        return redirect()->route('login'); // Redirect to login page or any other route
    }
    public function tablelist() {
        // Retrieve the list of tables from the database
        $tables = DB::select('SHOW TABLES');
        $tableNames = array_map('current', $tables);
    
        // Tables to exclude
        $excludeTables = [
            'failed_jobs',
            'migrations',
            'password_reset_tokens',
            'personal_access_tokens'
        ];
    
        // Filter out the excluded tables
        $filteredTables = array_filter($tableNames, function ($table) use ($excludeTables) {
            return !in_array($table, $excludeTables);
        });
        sort($filteredTables);
        return view('admin.tablelist', [
            'tablenames' => $filteredTables
        ]);
    }
    public function getcustomers(){
        $customers=Customer::all();
        return view('admin.customersDetail',compact('customers'));
    }
    


    
}
