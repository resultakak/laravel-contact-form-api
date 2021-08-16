<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Mail\ContactMessage;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $request->validate(['search' => 'max:100']);

        if(true === isset($request->search)) {
            $contact = Contact::where('body', 'like', "%{$request->search}%")->orderBy('id', 'desc')->paginate(10);
        } else {
            $contact = Contact::orderBy('id', 'desc')->paginate(10);
        }
        return ContactResource::collection($contact);
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
        $request->validate(
            [
                'name'    => 'required|min:2|max:100',
                'email'   => 'required|email|min:6|max:254',
                'subject' => 'required|min:1|max:70',
                'body'    => 'required|min:1|max:140',
            ]
        );

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->body = $request->body;
        if($contact->save()) {
            Mail::to($request->email)->queue(new ContactMessage($contact));
            return new ContactResource($contact);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return new ContactResource($contact);
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
        $contact = Contact::findOrFail($id);
        $contact->subject = $request->subject;
        $contact->body = $request->body;
        if($contact->save()) {
            return new ContactResource($contact);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        if($contact->delete()) {
            return new ContactResource($contact);
        }
    }
}
