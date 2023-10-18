<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\Crm\Invoice;
use Dadata\DadataClient;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dealer.invoices.index', [
            'invoices' => Invoice::all()->where('user_id', \Auth::id())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('dealer.invoices.create', [
            'data' => $request->all()
        ]);
    }

    public function loadData($inn)
    {
        $dadata = new DadataClient(env('DADATA_API'), env('DADATA_SECRET'));
        $result = $dadata->findById("party", "$inn", 1);

        return response()->json($result, options: JSON_UNESCAPED_UNICODE);
    }

    public function loadBankData($bik)
    {
        $dadata = new DadataClient(env('DADATA_API'), env('DADATA_SECRET'));
        $result = $dadata->findById("bank", "$bik", 1);

        return response()->json($result, options: JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $invoice = new Invoice();
        $invoice->hash = md5(\Auth::id() . time());
        $invoice->requisites = $data;
        $invoice->user_id = \Auth::id();
        $invoice->order_id = $data['order_id'];
        $invoice->save();

        return redirect()->route('dealer.invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
