<?php
namespace App\Core\Services;
use Openpay;
use OpenpayChargeList;

class OpenpayWrapper
{
    protected $openpay;
    public function __construct()
    {
        $this->openpay = Openpay::getInstance(env('OPENPAY_ID'),env('OPENPAY_SECRET_KEY'));
    }

    public function Production():self
    {
        $this->openpay::setProductionMode();

        return $this;
    }

    public function Development():self
    {
        $this->openpay::setSandboxMode();

        return $this;
    }

    protected function prepareData(array $data)
    {
        return [
            "method" => "card",
            'amount' =>$data['amount'],
            'description' => $data['description'],
            'customer' => [
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email']
            ],
            'send_email' => false,
            'confirm' => false,
            'redirect_url' => env('OPENPAY_CALLBACK')
        ];
    }

    public function createCharge(array $rawData = [])
    {
        $preparedData = $this->prepareData($rawData);

        $charge = $this->openpay->charges->create($preparedData);

        if(!$charge instanceof  \OpenpayCharge)
        {
            return null;
        }

        return $charge;
    }
}
