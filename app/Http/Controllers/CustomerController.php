<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.add');
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
            'nama' => 'required|string',
            'telp' => 'required|max:13',
            'alamat' => 'required|string',
            'email' => 'required|email|string|unique:customers,email'
        ]);
        try {
            $customer = Customer::create([
                'nama' => $request->nama,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'email' => $request->email,
            ]);
            return redirect('/customer')->with(['success' => '<strong>' . $customer->nama . '</strong> Berhasil disimpan']);
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
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
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
            'nama' => 'required|string',
            'telp' => 'required|max:13',
            'alamat' => 'required|string',
            'email' => 'required|email|string|exists:customers,email'
        ]);

        try {
            $customer = Customer::find($id);
            $customer->update([
                'nama' => $request->nama,
                'telp' => $request->telp,
                'alamat' => $request->alamat
            ]);
            return redirect('/customer')->with(['success' => 'Data <strong>' . $customer->nama . '</strong> telah diperbaharui']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
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
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back()->with(['success' => '<strong>' . $customer->nama . '</strong> Telah dihapus']);
    }
}
