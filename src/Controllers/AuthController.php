<?php

namespace Lynk\LynkAdmin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Lynk\LynkAdmin\Servers\AuthServer\LoginServer;

class AuthController extends BaseController
{
    public function login(Request $request, LoginServer $loginServer)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required', 'password' => 'required'
        ],[
            'name.required'=>'请输入用户名','password.required'=>'请输入密码'
        ]);
        if($validator->fails()){
            return $this->fail($validator->errors()->first());
        }
        try {
            $result = $loginServer->execute();
        }catch (\Exception $exception){
            return $this->fail($exception->getMessage());
        }
        return $this->success($result);
    }
}
