<?php

namespace App\Http\Controllers\Console;

use App\Console\PsychologicalRating;
use App\Http\Requests\StorePsychologicalRatingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PsychologicalRatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psychometrics = PsychologicalRating::whereSchoolId(auth()->user()->school->id)->paginate(10);
        return view('dashboard.psychometric.index', compact('psychometrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.psychometric.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePsychologicalRatingRequest $request)
    {
        PsychologicalRating::create($request->all());
        return redirect()->back()->with('success', 'metric saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Console\PsychologicalRating  $psychologicalRating
     * @return \Illuminate\Http\Response
     */
    public function show(PsychologicalRating $psychologicalRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Console\PsychologicalRating  $psychologicalRating
     * @return \Illuminate\Http\Response
     */
    public function edit(PsychologicalRating $psychologicalRating, $id)
    {
        $psychologicalRating = PsychologicalRating::findOrFail($id);
        return view('dashboard.psychometric.edit', compact('psychologicalRating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Console\PsychologicalRating  $psychologicalRating
     * @return \Illuminate\Http\Response
     */
    public function update(StorePsychologicalRatingRequest $request, PsychologicalRating $psychologicalRating, $id)
    {
        $p = PsychologicalRating::findOrFail($id);
        $p->fill($request->all())->save();
        return redirect()->route('psychometrics.index')->with('success', 'metric updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Console\PsychologicalRating  $psychologicalRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(PsychologicalRating $psychologicalRating)
    {
        //
    }
}
