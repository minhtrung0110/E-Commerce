<?php
namespace App\Http\Services;
use App\Jobs\SendMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CustomerService {
    private $OTP=111111;
    public function __construct(){
      //  
    }
    public function findCustomerwithEmail($email){
        
        return Customer::select('id','email','password')->where('email',$email)->where('status',1)->first();
    }
    public static function getInFo($id){
        return Customer::where('id',$id)->first();
    }
    public function update($request): bool
    {
        try {           
            Customer::where("id", $request->input('customer_id'))->update([
            'first_name' => (string)$request->input('first_name'),
            'last_name' => (string)$request->input('last_name'),
            'phone' => (string)$request->input('phone'),
            'gender' => (string)$request->input('gender'),  
            'address' => (string)$request->input('address'),
            ]);
        
        }  catch (\Exception $err)  {
            // session()->flash('error', 'Cập nhật nhân viên thất bại !!! ');
              //Log::info($err->getMessage());
             return false;
         }
         return true;

        }
        public function changePassword($request): bool
        {
            try {           
                Customer::where("id", $request->input('customer_id'))->update([               
                'password' =>bcrypt($request->input('new_password')),
                ]);
            
            }  catch (\Exception $err)  {
                // session()->flash('error', 'Cập nhật nhân viên thất bại !!! ');
                  //Log::info($err->getMessage());
                 return false;
             }
             return true;
    
        }
        public function changePasswordWithEmail($request): bool
        {
            try {           
                Customer::where("email", $request->input('email'))->update([               
                'password' =>bcrypt($request->input('new_password')),
                ]);
            
            }  catch (\Exception $err)  {
                // session()->flash('error', 'Cập nhật nhân viên thất bại !!! ');
                  //Log::info($err->getMessage());
                 return false;
             }
             return true;
    
        }
    public function sendOTP($email){ 
        $this->OTP=random_int(100000, 999999);

        $data=[
            'reset_password' =>true,
            'otp'=>$this->OTP,
            'email'=>$email,
        ];
        SendMail::dispatch($data)->delay(now()->addSeconds(5));
        return $this->OTP;
    }
    public function checkOTP($otp){
        dd($this->OTP);
        return ($this->OTP==$otp);
    }
}
   


