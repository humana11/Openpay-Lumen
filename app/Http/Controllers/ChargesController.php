<?php
namespace App\Http\Controllers;
use App\Core\Services\OpenpayWrapper ;
use App\Exceptions\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Charge;
use Carbon\Carbon;

class ChargesController extends Controller
{

    const DEFAULT_STATUS = 0;
    public function __invoke(Request $request,OpenpayWrapper $openpay)
    {
        //Reglas de validacion del request
        $validationRules = [
            'last_name' => ['required','string'],
            'name'=>'required',
            'email' =>['required','email'],
            'amount'=>['required','numeric'],
            'phone_number'=>['required','numeric'],
            'description'=>['required','string']
        ];

        $validator = Validator::make($request->all(),$validationRules);

        if($validator->fails())
        {
           $this->throwException($validator);
        }

        $openpayCharge = $openpay->createCharge($validator->validated());

        $charge = Charge::create([
                'charge_id'=>$openpayCharge->id,
                'amount'=>$openpayCharge->amount,
                'auth'=>$openpayCharge->authorization,
                'operation_date'=>Carbon::create($openpayCharge->creation_date)->format('Y-m-d'),
                'description'=>$openpayCharge->description,
                'status' => self::DEFAULT_STATUS,
                'currency'=>$openpayCharge->currency
            ]);

        return response()->json([
                'Status'=>'Charge succeeded',
                'data'=>[
                    'id'=>$charge->id,
                    'amount'=>$charge->amount,
                    'operation_date'=>$charge->operation_date,
                    'description'=>$charge->description,
                    'status' => $charge->status,
                    'url'=>$openpayCharge->payment_method->url
                ]
            ],200
        );
    }

    protected function throwException($validator,$code = 401)
    {
        throw new ValidationException($validator->errors());
    }

}
