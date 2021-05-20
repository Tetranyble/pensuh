<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Http\Requests\StoreFeeReqest;
use App\SchoolType;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fee::whereSchoolId(auth()->user()->school->id)->latest()->paginate(30);
        return view('dashboard.fee.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schoolTypes = SchoolType::whereSchoolId(auth()->user()->school->id)->get();
        return view('dashboard.fee.create', compact('schoolTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeeReqest $request)
    {
        Fee::create($request->all());
        return back()->with('success', 'fee saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        return '<p>No implementation!</p>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        $schoolTypes = SchoolType::whereSchoolId(auth()->user()->school->id)->get();
        return view('dashboard.fee.edit', compact('schoolTypes', 'fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFeeReqest $request, Fee $fee)
    {
        $fee->fill($request->all())->save();
        return redirect()->route('fees.index')->with('success', 'fee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        return '<p>No implementation!</p>';
    }
}
