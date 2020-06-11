<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class NotificationsController extends Controller
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
     * @param Request $request
     */
    public function handle(Request $request)
    {
       $request->all();
    }
}
