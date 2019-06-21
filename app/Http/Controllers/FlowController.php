<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DarkGhostHunter\FlowSdk\Flow;
use Exception;
use Response;

class FlowController extends Controller
{

    public function createPayment(Request $request) {
        // $flow = Flow::make('production', [
        //     'apiKey'    => '7B19A4CF-F041-40C4-9488-4180L75A6AAA',
        //     'secret'    => '8a8c824cd4550b1ee4d581a1d3404d9d640638b0',
        // ]);
        $flow = Flow::make('sandbox', [
                'apiKey'    => '4901F750-B96D-48A9-A2F7-665890L3D714',
                'secret'    => '6ab4910b8b8ca948942d3ace580f98ab1abc49c9',
            ]);

        try {
          $paymentResponse = $flow->payment()->commit([
              'commerceOrder'     => (string) random_int ( 10 , 1000 ) ,
              'subject'           => 'Cobro',
              'amount'            => $request->amount,
              'email'             => 'jmanuel.jorquera@gmail.com',
              'urlConfirmation'   => url('/').'/flow/confirm',
              'urlReturn'         => url('/').'/flow/return',
              'optional'          => [
                  'Message' => 'Tu orden esta en proceso!'
              ]
          ]);
        }
        catch ( Exception $e) {
            //return $e->getMessage();
            return response()->json([
                'data' => [],
                'error' => $e->getMessage(),
            ]);
            //return Redirect::back()->withErrors(array('flow' => $e->getMessage()));
        }

        return response()->json([
            'data' => [
                'url' => $paymentResponse->getUrl()
            ],
            'error' => [],
        ]);


    }

    public function return() {
        return view('return');
    }
    public function confirm() {
        return response('confirm', 200);
    }
}
