<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(25);

        return OrderResource::collection($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'lender_id' => 'required|integer|exists:lenders',
            'loan_id' => 'required|integer|exists:loans',
            'amount' => 'required|numeric',
            'duration' => 'required|integer',
            'purpose' => 'nullable|string',
        ]);
                
        $order = new Order;

        $order->lender_id = $request->input('lender_id');
        $order->loan_id = $request->input('loan_id');
        $order->amount = $request->input('amount');
        $order->duration = $request->input('duration');
        $order->purpose = $request->input('purpose');
        $order->req_date = date('Y-m-d');

        if ($order->save()) {
            return new OrderResource;
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
        $order = Order::findOrFail($id);

        return new OrderResource($order);
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
        $request->validate([
            'loan_id' => 'required|integer|exists:loans',
            'amount' => 'required|numeric',
            'duration' => 'required|integer',
            'purpose' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);
        
        $order->loan_id = $request->input('loan_id');
        $order->amount = $request->input('amount');
        $order->duration = $request->input('duration');
        $order->purpose = $request->input('purpose');

        if ($order->save()) {
            return new OrderResource;
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
        $order = Order::findOrFail($id);

        if ($order->delete()) {
            return new OrderResource($order);
        }
    }
}
