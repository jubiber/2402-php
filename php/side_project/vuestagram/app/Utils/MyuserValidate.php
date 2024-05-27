<?php

namespace App\Utils;

use App\Utils\MyValidate;


class MyUserValidate extends MyValidate {
    protected $validateList = [
        'account' => ['required', 'min:5', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
        ,'password' => ['required', 'min:5', 'max:20', 'regex:/^[a-zA-Z0-9!@]+$/']
        ,'password_chk' => ['required', 'min:5', 'max:20', 'regex:/^[a-zA-Z0-9!@]+$/']
        ,'apssword_chk' => ['same:password']
        ,'name' => ['required', 'min:5', 'max:20', 'regex:/^[가-힣]+$/']
        ,'gender' => ['required', 'regex:/&[0-9]{1}$/']
        ,'profile' => ['image']
    ];
}