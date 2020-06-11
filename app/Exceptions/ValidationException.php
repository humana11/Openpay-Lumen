<?php


namespace App\Exceptions;
use Illuminate\Contracts\Support\Responsable;
use Throwable;

class ValidationException extends  \Exception implements  Responsable
{
    public function __construct($errors = [], $code = 401, Throwable $previous = null)
    {
        $this->errors = $errors;
        parent::__construct($message = "", $code, $previous);
    }

    public function toResponse($request)
    {
        return response()->json([
            'status'=>'Operation Failed',
            'errors'=>$this->errors
        ],$this->code);
    }
}
