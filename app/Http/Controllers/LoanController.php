<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanResource;
use App\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loans = Loan::paginate(25);

        return LoanResource::collection($loans);
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
            'title' => 'required|string',
            'summary' => 'nullable|string',
        ]);

        $loan = new Loan;

        $loan->photo = $request->input('title');
        $loan->names = $request->input('summary');

        if ($loan->save()) {
            return new LoanResource;
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
        $loan = Loan::findOrFail($id);

        return new LoanResource($loan);
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
            'title' => 'required|string',
            'summary' => 'nullable|string',
        ]);
                
        $loan = Loan::findOrFail($id);

        $loan->photo = $request->input('title');
        $loan->names = $request->input('summary');

        if ($loan->save()) {
            return new LoanResource;
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
        $loan = Loan::findOrFail($id);

        if ($loan->delete()) {
            return new LoanResource($loan);
        }
    }
}
