<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Detail_invoice;
use App\Invoice;
use App\Product;
use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoice  = Invoice::with(['customer', 'detail'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::orderBy('created_at', 'DESC')->get();
        return view('invoice.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id'
        ]);

        try {
            $invoice = Invoice::create([
                'customer_id' => $request->customer_id,
                'total' => 0
            ]);

            // return redirect(route('invoice.edit', ['id' => $invoice->id]));
            return redirect('/invoice/' . $invoice->id . '/edit');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $invoice = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        $products = Product::orderBy('title', 'ASC')->get();
        return view('invoice.edit', compact('invoice', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'product_id' => 'required|exists:product,id',
            'banyak_brg' => 'required|integer'
        ]);

        try {
            $invoice = Invoice::find($id);
            $product = Product::find($request->product_id);
            $detail_invoice = $invoice->detail()->where('product_id', $product->id)->first();

            if ($detail_invoice) {
                # code...
                $detail_invoice->update([
                    'banyak_brg' => $detail_invoice->banyak_brg + $request->banyak_brg
                ]);
            } else {
                # code...
                Detail_invoice::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $request->product_id,
                    'harga' => $product->harga,
                    'banyak_brg' => $request->barang_brg
                ]);
            }

            return redirect()->back()->with(['success' => 'Product Telah Ditambahkan']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->back()->with(['success' => 'Data telah dihapus']);
    }

    public function deleteProduct($id)
    {
        # code...
        $detail = Detail_invoice::find($id);
        $detail->delete();
        return redirect()->back()->with(['success' => 'Product telah dihapus']);
    }

    public function generateInvoice($id)
    {
        $invoice = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        $pdf = PDF::loadView('invoice.print', compact('invoice'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
