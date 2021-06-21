<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityCardsRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class IdentityCardController extends Controller
{

    public function __construct( Auth $auth)
    {
        $this->middleware('auth');

    }


    /**
     * Display a listing of the resource.
     *
     * @param IdentityCardsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function students(IdentityCardsRequest $request)
    {
        $users = User::with('school', 'studentInfo')->where('active', true)->whereHas("roles", function($q){ $q->where("slug", "student"); })->where('school_id', auth()->user()->school->id)->paginate($request->get('paginate'));
        $principal = User::whereHas("roles", function($q){ $q->where("slug", "principal"); })->where('school_id', auth()->user()->school->id)->first();
        return view('dashboard.identitycard.students', compact('users', 'principal'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param IdentityCardsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function teachers(IdentityCardsRequest $request)
    {
        $users = User::with('school', 'studentInfo')
            ->where('active', true)
            ->whereHas("roles", function($q){ $q->where("slug", "principal")
            ->orWhere('slug', 'admin')
                ->orWhere('slug', 'public_relation_officer')
                ->orWhere('slug', 'bursar')
                ->orWhere('slug', 'exam_head')
                ->orWhere('slug', 'vice_principal_admin')
                ->orWhere('slug', 'vice_principal_academy')
                ->orWhere('slug', 'dean_of_study')
                ->orWhere('slug','librarian'); })
            ->where('school_id', auth()->user()->school->id)->paginate($request->get('paginate'));
        $principal = User::whereHas("roles", function($q){ $q->where("slug", "principal"); })->where('school_id', auth()->user()->school->id)->first();
        return view('dashboard.identitycard.teachers', compact('users', 'principal'));
    }
}
