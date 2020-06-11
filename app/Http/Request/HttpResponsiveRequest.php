<?php
namespace App\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Validation\ValidatesWhenResolvedTrait;

class HttpResponsiveRequest extends  Request implements  ValidatesWhenResolved
{
    use ValidatesWhenResolvedTrait;

    public function validateResolved()
    {

    }
}
