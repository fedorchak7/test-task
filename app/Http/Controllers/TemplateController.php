<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Models\Contact;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $templates = Template::query()
            ->where('user_id','=', $user_id)
            ->paginate();

        return view('templates.index', compact('templates'));
    }

    public function add()
    {
        return view('templates.add');
    }

    public function show($id)
    {
        $template = Template::findOrFail($id);
        return view('templates.template', compact('template'));
    }

    public function store(TemplateRequest $request)
    {
        $template = Template::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('template/' . $template->id);
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('templates.edit', compact('template'));
    }

    public function update(TemplateRequest $request, $id)
    {
        $template = Template::findOrFail($id);
        $template->subject = $request->subject;
        $template->body = $request->body;
        $template->touch();
        $template->update();
        return redirect('template/' . $template->id);
    }
}
