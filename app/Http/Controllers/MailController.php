<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\TestMail;
use App\Models\Contact;
use App\Models\Mail;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class MailController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $contacts = Contact::query()
            ->where('user_id','=', $user_id)
            ->get();
        $templates = Template::query()
            ->where('user_id','=', $user_id)
            ->get();

        return view('mails.send', compact(['contacts','templates']));
    }
    public function send(Request $request)
    {
        $arr = [];
        $user_id = Auth::user()->id;
        $template = Template::findOrFail($request->template);
        foreach ($request->contact as $contact_id){
            $contact = Contact::findOrFail($contact_id);
            $subject = $template->subject;
            $body = $template->body;
            $tochange = array("contact.first_name", "contact.last_name", "contact.email", "contact.work_place", "contact.address");
            $contact_fields   = array($contact->first_name, $contact->last_name, $contact->email, $contact->work_place, $contact->address);
            $newsubject = str_replace($tochange, $contact_fields, $subject);
            $newbody = str_replace($tochange, $contact_fields, $body);
            $arr[]= [
                'subject' => $newsubject,
                'body' => $newbody,
                'email' => $contact->email
            ];
            SendEmail::dispatch($newsubject, $newbody, $contact->email);
            $mail = Mail::create([
                'subject' => $newsubject,
                'body' => $newbody,
                'user_id' => $contact_id,
                'author_id' => $user_id,
            ]);
        }

        //Mail::to($recipient)->send(new TestMail($template));
        dd($arr);
    }
}
