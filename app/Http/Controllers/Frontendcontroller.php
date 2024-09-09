<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Services\OTPService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Frontendcontroller extends Controller
{

    // protected $otpService;

    // public function __construct(OTPService $otpService)
    // {
    //     $this->otpService = $otpService;
    // }
    // public function sendOTP(Request $request)
    // {
    //     $request->validate([
    //         'phone' => 'required|numeric|digits:10' // For a 10-digit phone number
    //     ]);
                 
        


    //     $phone = $request->input('phone');

    //     $phoneWithCountryCode ='+91'.$phone;
    //     $otp = rand(100000, 999999); // Generate a 6-digit OTP
         
    //     // Store OTP in session or database
    //     Session::put('otp', $otp);
    //     Session::put('phone',$phoneWithCountryCode);

    //     // Send OTP via SMS using the service
    //     $this->otpService->sendOTP( $phoneWithCountryCode, $otp);

    //     return to_route('user.verifyotp_view'); // Redirect to OTP verification page
    // }

   
    // public function verifyOTP(Request $request)
    // {
    //     $request->validate([
    //         'otp' => 'required|numeric'
    //     ]);
    
    //     $inputOTP = $request->input('otp');
    //     $sessionOTP = Session::get('otp');
    //     $phone = Session::get('phone');
    
    //     // Remove +91 from the phone number
    //     $phone = str_replace('+91', '', $phone);
    
    //     if ($inputOTP == $sessionOTP) {
    //         // OTP is correct, proceed with login or registration
    
    //         // Find the user by phone number
    //         $user = Customer::where('phone', $phone)->first();
    
    //         if ($user) {
    //             // Check if the user is a customer
    //             if ($user->is_customer) {
    //                 // Log the user in without a password
    //                 Auth::guard('custom')->login($user);
    
    //                 // Clear OTP and phone from session
    //                 Session::forget('otp');
    //                 Session::forget('phone');
    
    //                 return redirect()->route('front.home')->with('validotp', 'Login successful!');
    //             } else {
    //                 return back()->with('fail', 'You are not authorized to log in.');
    //             }
    //         } else {
    //             return back()->with('fail', 'Login failed. User not found.');
    //         }
    //     } else {
    //         return back()->withErrors(['otp' => 'Invalid OTP.']);
    //     }
    // }

    public function index(){
        return view('user.productsList');
    }
    public function aboutus(){
        return view('user.aboutus');
    }
    public function contactus(){
        return view('user.contactus');
    }
   public function loginView(){
       
        return view('user.registration.login');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
    
        $imageName = null;
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $moved = $image->move(public_path('profiles'), $imageName);
        
            // if (!$moved) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Failed to upload image.'
            //     ], 500);
            // }
        }
    
        // // Log the image name to ensure it's being set correctly
        // Log::info('Image Name:', ['imageName' => $imageName]);
    
        try {
            $user = Customer::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'image_path' => $imageName,
                'is_customer' => true, // Set to true by default
            ]);
    
            // // Log user creation success
            // Log::info('User created successfully:', ['user' => $user]);
    
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error creating user:', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'User registered successfully.',
            'redirect_url' => route('user.login') // Redirect URL after registration
        ]);
    }
    
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('custom')->attempt($credentials)) {
        $user = Auth::guard('custom')->user();

        if ($user->is_customer) {
            return response()->json([
                'success' => true,
                'message' => 'Successfully logged in.',
                'redirect_url' => $request->input('redirect', '/')
            ]);
        } else {
            Auth::guard('custom')->logout();
            return response()->json([
                'success' => false,
                'message' => 'This account is not authorized as a customer.'
            ], 403);
        }
    }

    return response()->json([
        'success' => false,
        'message' => 'The provided credentials do not match our records.'
    ], 401);
}

        
    public function logout(Request $request){
        Auth::guard('custom')->logout(); 
        $request->session()->invalidate(); // Invalidate the session data

        $request->session()->regenerateToken();// Use the correct guard
        return redirect()->route('user.login');
    }
    public function signup(){
        return view('user.registration.userregister');
    }
    public function account(){
        $user = Auth::guard('custom')->user();
        return view('user.account.accountdetails',compact('user'));
    }
    public function orders(){
        return view('user.ordersdetails');
    }

   
           
        public function update(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'password' => 'nullable|string|min:8|confirmed',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the authenticated user
    $user = Auth::guard('custom')->user();


    $imageName = null;
    if ($request->hasFile('profile')) {
        $image = $request->file('profile');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $moved = $image->move(public_path('profiles'), $imageName);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image_path=$imageName;
    
    }else{
        $user->name = $request->name;
        $user->email = $request->email;
       
    }
    // Update user details
   

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Save changes
    $user->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Account updated successfully.');
}


public function forgotPassword(){
    return view('user.registration.forgotpassword');
}
    }
