<?php

namespace App\Http\Controllers;

use App\Http\Resources\LenderResource;
use App\Lender;
use Illuminate\Http\Request;

class LenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lenders = Lender::paginate(25);

        return LenderResource::collection($lenders);
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
            'photo' => 'nullable|image',
            'names' => 'required|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:lenders',
            'tel' => 'required|string',
            'password' => 'required|string',
        ]);

        $lender = new Lender;

        $lender->photo = $request->input('photo');
        $lender->names = $request->input('names');
        $lender->sex = $request->input('sex');
        $lender->dob = $request->input('dob');
        $lender->address = $request->input('address');
        $lender->email = $request->input('email');
        $lender->tel = $request->input('tel');
        $lender->rel = $request->input('rel');
        $lender->password = $request->input('password');

        if ($lender->save()) {
            return new LenderResource;
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
        $lender = Lender::findOrFail($id);

        return new LenderResource($lender);
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
            'photo' => 'nullable|image',
            'names' => 'required|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'tel' => 'required|string',
        ]);

        $lender = Lender::findOrFail($id);

        $lender->photo = $request->input('photo');
        $lender->names = $request->input('names');
        $lender->sex = $request->input('sex');
        $lender->dob = $request->input('dob');
        $lender->address = $request->input('address');
        $lender->tel = $request->input('tel');
        $lender->rel = $request->input('rel');

        if ($lender->save()) {
            return new LenderResource;
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
        $lender = Lender::findOrFail($id);

        if ($lender->delete()) {
            return new LenderResource($lender);
        }
    }
}
