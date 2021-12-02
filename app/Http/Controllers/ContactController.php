<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $contacts = Contact::query()
            ->where('user_id','=', $user_id)
            ->paginate();

        return view('contacts.index', compact('contacts'));
    }

    public function add()
    {
        return view('contacts.add');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.contact', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'work_place' => $request->work_place,
            'address' => $request->address,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('contact/' . $contact->id);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->work_place = $request->work_place;
        $contact->address = $request->address;
        $contact->touch();
        $contact->update();
        return redirect('contact/' . $contact->id);
    }
}
