<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *
     *  Recibe el cargo y ejecuta la operacion.
     */
    public function __invoke()
    {
        dd(new Validator());
    }
}
