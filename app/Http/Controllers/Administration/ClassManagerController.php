<?php

namespace App\Http\Controllers\Administration;

use App\Classes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRequest;
use App\Syllabus;
use Illuminate\Http\Request;

class ClassManagerController extends Controller
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
        $classes = Classes::paginate();

        return view('dashboard.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $syllabi = Syllabus::all();
        return view('dashboard.class.create', compact( 'syllabi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRequest $request)
    {

        Classes::create($request->all());
        return redirect()->back()->with('success', 'class created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        dd($classes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes, $id)
    {
        $syllabi = Syllabus::all();
        $class = Classes::findOrFail($id);

        return view('dashboard.class.edit', compact('class', 'syllabi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClassRequest $request, Classes $classes, $id)
    {
        $class = Classes::findOrFail($id);
        $class->syllabus_id = $request->syllabus_id;
        $class->name = $request->name;
        //$class->slug = $request->slug;
        $class->description = $request->description;
        $class->age = $request->age;
        $class->save();
        return redirect()->back()->with('success', 'class updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
