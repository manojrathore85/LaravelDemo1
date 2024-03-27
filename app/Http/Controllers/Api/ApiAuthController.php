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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){          
            return $this->fail($validator->errors(),[]);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $data['token'] = $user->createToken('MyApp')->plainTextToken;
        $data['name'] = $user->name;
        return $this->success('User register successfully', $data);
    }
    public function login(Request $request){  
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);        
        if(Auth::attempt(['email' => $request->input('email'), 'password' =>$request->input('password')])){
            $user = Auth::user();
            $token = 
            return $this->success('You successfull loged in', $user);  
        }else{
           return $this->fail('Invalid user name or password');
        }
    }
    public function logout(request $request){
     
        try {
            $user =  $request->user();
            $user->tokens()->delete();
            $this->success('You successfull logged out');
        } catch (\Exception $e) {
            $this->fail('getting error:'.$e->getMessage());
        }
    }
}
