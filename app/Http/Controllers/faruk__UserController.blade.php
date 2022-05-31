<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Nexmo\Laravel\Facade\Nexmo;
use DB;
use Hash;


class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
        Log::info($request);
        if(Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
            return redirect('/');
        }
        else{
            return Redirect::back();
        }
    }

    public function loginWithOtp(Request $request){
        Log::info($request);
        $user  = User::where([['mobile','=',request('mobile')],['otp','=',request('otp')]])->first();
        if( $user){
            Auth::login($user, true);
            User::where('mobile','=',$request->mobile)->update(['otp' => null]);
            return redirect('/');
        }
        else{
            return Redirect::back();
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        // $input = $request->all();
        // $input['password'] = bcrypt($input['password']);
        // User::create($input);

        $supplier_code = User::count();
        $user = new User();
        if($supplier_code < 10){
            $user->customer_id = '#000000'. $supplier_code;
        }elseif($supplier_code <=100){
            $user->customer_id = '#00000'. $supplier_code;
        }
        elseif($supplier_code <=1000){
            $user->customer_id = '#0000'. $supplier_code;
        } elseif($supplier_code <=10000){
            $user->customer_id = '#000'. $supplier_code;
        } elseif($supplier_code <=100000){
            $user->customer_id = '#00'. $supplier_code;
        }
        else{
            $user->customer_id = '#0'. $supplier_code;
        }

    // ------------------------auto data create---------------------

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->password =  bcrypt($request->password);
        $user->save();
        return redirect('/');
    }

    public function sendOtp(Request $request){

        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        // $user = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
        $input = $request->all();
        $input['otp'] = $otp;

        $user = DB::table('users')->where('mobile', $request->mobile)->first();
        if($user == true){
          $updateUserOTP = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
        }
        else{
            User::create($input);
        }

        $url = "http://66.45.237.70/api.php";
        $number=$request->mobile;
        $text="Your Grocery OTP Code is ".$otp;
        $data= array(
        'username'=>"ShahidMahmum",
        'password'=>"Shahid26@.",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];

        //
        // $otp = rand(1000,9999);
        // Log::info("otp = ".$otp);
        // $user = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
        // // send otp to mobile no using sms api
        // $basic  = new \Vonage\Client\Credentials\Basic('b3a96edd','WFlePPb2d6Be7Req');
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS('+880 1887645449',Excelitai, 'Your OTP code is'.$otp)
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
        //  return response()->json([$user],200);
    }

    // public function sendSms()
    // {
    //     $url = "http://66.45.237.70/api.php";
    //     $number="01940909766";
    //     $text="Hello Bangladesh";
    //     $data= array(
    //     'username'=>"ShahidMahmum",
    //     'password'=>"Shahid26@.",
    //     'number'=>"$number",
    //     'message'=>"$text"
    //     );

    //     $ch = curl_init(); // Initialize cURL
    //     curl_setopt($ch, CURLOPT_URL,$url);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $smsresult = curl_exec($ch);
    //     $p = explode("|",$smsresult);
    //     $sendstatus = $p[0];
    // }


    function loginWithEmail(Request $request){
        // return $request;

        $user = DB::table('users')->where('email', $request->email)->first();

        if($user == true){
            Log::info($request);
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){


                return true;
            }
            else{
                return false;
            }

        }
        else{
            // dd($request);
            // $input = $request->all();
            // $input ['email'] = $request['email'];
            // $input['password'] = bcrypt($request['password']);
            // DB::table('users')->insert([
            //     'email' => $input ['email'],
            //     'password' => $input ['password']
            // ]);
            // return $input;

            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();


            Auth::login($user);

            if(Auth::check())
            {
                return true;


            }
            else
            {
                return false;
            }
            // return true;
        }
    }
}