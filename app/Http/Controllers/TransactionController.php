<?php

namespace App\Http\Controllers;

use App\Services\ReceiptService;
use App\Services\TransactionService;
use App\Transaction;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class TransactionController extends Controller
{
    private $transactionService;
    private $receiptService;
    public function __construct( TransactionService $transactionService, ReceiptService $receiptService)
    {
        $this->middleware('auth');
        $this->transactionService = $transactionService;
        $this->receiptService = $receiptService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $pay = Paystack::getPaymentData();
            $transaction = $this->transactionService->create($pay);
            $this->receiptService->create($transaction);
        }catch (\Exception $e){
            dd($e);
            return response()->json([
                'status' => 'error',
                'message' => $e
            ]);
        }
        return response()->json([
            'status' => $pay['data']['status'],
            'message' => $pay['message']
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $url =  Paystack::getAuthorizationUrl();

        }catch(\Exception $e) {
            return redirect()->back()->with('error','The paystack token has expired. Please refresh the page and try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
