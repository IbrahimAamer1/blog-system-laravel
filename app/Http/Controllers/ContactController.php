<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreContact;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function store(StoreContact $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return redirect()->back()->with('success','اتبعتت يازميكس بنجاح');
    }
}