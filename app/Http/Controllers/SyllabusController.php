<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSyllabusRequest;
use App\Services\Schools;
use App\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    protected $schools;
    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabi = Syllabus::whereSchoolId($this->schools->id())->paginate(20);
        return view('dashboard.syllabus.index', compact('syllabi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.syllabus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSyllabusRequest $request)
    {
        Syllabus::create($request->all());
        return back()->with('success', 'syllabus saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        return $syllabus->name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        return view('dashboard.syllabus.edit', compact('syllabus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSyllabusRequest $request, Syllabus $syllabus)
    {
        $syllabus->fill($request->all())->save();
        return redirect()->route('syllabi.index')->with('success', 'syllabus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        return 'there is nothig here';
    }
}
