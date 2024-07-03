<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }
}

function my_sum($num1, $num2) {
    return $num1 + $num2;
}

echo my_sum(3, 5);

$str = " sdsd ";
echo trim($str);

$str = "abcd";
echo strtoupper($str);

$str = "";
$str = null;
var_dump(isset($str1));

