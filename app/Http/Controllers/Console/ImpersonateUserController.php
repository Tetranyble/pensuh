<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImpersinateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateUserController extends Controller
{
    /**
     * @param ImpersinateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function impersonate(ImpersinateRequest $request){
        auth()->user()->impersonate(User::find($request->id));
        return redirect()->route('dashboard');
    }

    /**
     * @param ImpersinateRequest $request
     */
//    public function leave(Request $request){
//        auth()->user()->leaveImpersonation();
//
//    }
}
