<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagerRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SystemUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserManagerRequest $request)
    {
        if ($request->input('search')) {
            $users = User::with(['roles', 'school'])->where([['username', 'LIKE', '%' . Str::lower($request->input('search')) . '%']])
                ->orWhere([['code', 'LIKE', '%' . $request->input('search') . '%']])->paginate(20);
        }else{
            $users = User::with(['roles', 'school'])->paginate(20);
        }

        return view('dashboard.master.users', compact('users'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
