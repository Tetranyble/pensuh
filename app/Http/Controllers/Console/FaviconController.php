<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFaviconRequest;
use App\Rules\Favicon;
use App\School;
use App\Services\UploadHandler;
use Illuminate\Http\Request;

class FaviconController extends Controller
{
    private $uploadHandle;
    public function __construct(UploadHandler $uploadHandler)
    {
        $this->uploadHandle = $uploadHandler;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.school.favicon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateFaviconRequest $request)
    {
        $this->uploadHandle->favicon($request, 'favicon_x', 'favicon', 'favicon');
        School::whereId($request->school_id)->update($request->except(['_token', 'school_id', 'favicon_x']));
        return redirect()->back()->with('success', 'school updated successfully');
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
    }
}
