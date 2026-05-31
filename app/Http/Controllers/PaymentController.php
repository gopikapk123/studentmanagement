<?php

namespace App\Http\Controllers;
use Razorpay\Api\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment.payment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function    store(Request $request)
    {
       $api=new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));

         $order=$api->order->create([
            'receipt'=>'receipt_'.rand(1000,9999),
            'amount'=>$request->amount *100,
            'currency'=>'INR'
         ]);


         return view('payment.payment',[
            'order_id'=>$order['id'],
             'amount' => $request->amount,
            'name' => $request->name,
            'email' => $request->email
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function success(request $request)
    {
        //  dd($request->all());
        Payment::create([
               'name'=>$request->name,
               'email'=>$request->email,
               'amount'=>$request->amount,
               'psyment_id'=>$request->razorpay_payment_id,
               'order_id'=>$request->razorpay_order_id,
               'status'=>'success'

        ]);
        return redirect ('/payment/receipt/'. $request->razorpay_payment_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function receipt($payment_id)
    {
       $payment=Payment::where('psyment_id',$payment_id)->first();
       $pdf=Pdf::loadView('payment/receipt',compact('payment'));

       return $pdf->download('receipt.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
