<?php

namespace App\Http\Controllers\Console;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSchoolRequest;
use App\Http\Requests\UserManagerRequest;
use App\Http\Requests\VendorStoreAdminRequest;
use App\Mail\SchoolAdminCreation;
use App\School;
use App\Services\UploadHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SystemUsersController extends Controller
{
    private $fileHandle;

    public function __construct( UploadHandler $fileHandle)
    {
        $this->fileHandle = $fileHandle;
    }
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

        return view('dashboard.master.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateSchoolRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateSchoolRequest $request)
    {
//        $genders = Gender::where('school_id', $request->school)->orWhere('school_id', '')->get();
        $school = School::whereId($request->school)->first();
        return view('dashboard.master.users.create', compact( 'school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorStoreAdminRequest $request)
    {
        DB::transaction(function () use($request){
            $user = User::create($request->all());
            $user->assignRole($request->role);
            $user->school_name = $request->school_name;
            $user->alias = $request->alias;
            $user->pass = $request->pass;
            $school = School::whereId($request->school_id)->first();
            Mail::to($request->email)
                ->cc(env('MAIL_USERNAME'))
                ->send(new SchoolAdminCreation($user, $school, $request->pass));
        });

        return redirect()->route('schools.index')->with('success', 'admin created successfully');

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
