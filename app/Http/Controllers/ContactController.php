<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactAcknowledgement;
use App\Services\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private $schools;

    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $request->merge(['school_id' => $this->schools->id()]);
        $contact = Contact::create($request->all());

        Mail::to($this->schools->school()->email)
            ->send(new \App\Mail\Contact($contact));
        Mail::to($contact->email)
            ->send(new ContactAcknowledgement($contact, $this->schools->school()));
        return response()->json([
            'status' => 'success',
            'success' => 'We have received your inquiry. We would get back to you as soon as possible.'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
