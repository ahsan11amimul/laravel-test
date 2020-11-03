<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Carbon\Carbon;



use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    //
    public function create()
    {
        return view('test.register');
    }
    public function store(Request $request){
       $validateData=$request->validate([
        'firstname'=>'required|min:3|max:40',
        'lastname'=>'required|min:3|max:40',
        'organization'=>'required|min:3|max:40',
        'city'=>'required|min:3',
        'street'=>'required|min:3',
        'email'=>'email:rfc,dns',
        'password'=>'required|confirmed',
        'mobile'=>'required|digits:11'
       ]);
       
       $validateData['password']=bcrypt($validateData['password']);
       //dd($validateData);
       //$hashed_password=Hash::make($validateData['password']);
      
       //User::create(array_merge($validateData,['password'=>$hashed_password]));
       User::create($validateData);
       return redirect('/login')->with('status','Registration SuccessFully!!!');
    }
    public function login_create()
    {
        return view('test.login');
    }
     public function login_store(Request $request)
    {
      $validateData=$request->validate([
      'mobile'=>'required',
      'password'=>'required'
      ]);
     $mobile=$validateData['mobile'];
     $password=$validateData['password'];
     //$user=DB::table('users')->where(['mobile'=>$mobile,'password'=>$password])->first();
    if( Auth::attempt(['mobile' => $mobile, 'password' => $password,'status'=>1]))
     {
         return redirect('/dashboard')->with('success','Welcome to your dashboard');
     }else{
         return redirect()->back()->with('error','Invalid credentials Or create license Key and activate account!!');
     }
   
  
    }
    public function license_create()
    {
        return view('test.license');
    }
    public function get_info(Request $request,$id)
    {
     $user=User::findOrFail($id);
     return response()->json(['data' => $user]);
    }
    public function get_key(Request $request,$id)
    {
       $user=User::findOrFail($id);
       $user_key=Str::random(14);
       $license_key=Crypt::encryptString($user_key.$user->id.$request->expire_date);
       try
       {
          $decrypted = Crypt::decryptString($license_key);
        } catch (DecryptException $e) {
        echo $e;
        }
     return response()->json(['data' => $license_key]);
    }
    public function update_key(Request $request)
    {
      
      $final_date=Carbon::now()->addMonths($request->expire_date);
      $final=date_format($final_date,'d/m/Y');
      $user=User::findOrFail($request->client_id);
      $user->update(['license_key'=>$request->license_key,'expire_date'=>$final_date,'status'=>1]);
      return redirect('/login')->with('success','Congratulations!! Your License Has Been Activated. It will work till '.$final);
    }
    public function get_dashboard()
    {   
        
        return view('test.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}  
