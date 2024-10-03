<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ApiAuthController extends Controller
{
    use ApiResponseTrait;
    public function register(Request $request){
        //echo "<pre>"; print_r($_POST); echo "</pre>";exit;
        // $validator = Validator::make($request->all(),[
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|email|unique:users,email,',
        //     'password' => 'required',
        //     'c_password' => 'required|same:password',
        // ]);
        // if($validator->fails()){          
        //     return $this->fail($validator->errors(),[]);
        // }

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        $input = $request->all();
        //echo "<pre>"; print_r($input); echo "</pre>";
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $data['token'] = $user->createToken('MyApp')->plainTextToken;
        $data['user'] = $user;
        return $this->success('User register successfully', $data);
    }
    public function login(Request $request){  
        
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);   

        if(Auth::attempt(['email' => $request->input('email'), 'password' =>$request->input('password')])){
            $user = Auth::user();
            //$token = 
            $data = [
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken,
            ];
            return $this->success('You success full logged in', $data);  
        }else{
           return $this->fail('Invalid user name or password111');
        }
    }
    public function logout(request $request){
     
        try {
            $user =  $request->user();
            $user->tokens()->delete();
            $this->success('You success full logged out');
        } catch (\Exception $e) {
            $this->fail('getting error:'.$e->getMessage());
        }
    }
}
