<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreSubscribersRequst;
use Illuminate\Http\Request;
use App\Models\Subscriber;
class SubscriberController extends Controller
{
    public function store(StoreSubscribersRequst $request)
    {
        $data = $request->validated();
        Subscriber::create($data);
       return redirect()->back()->with('success', 'You are now subscribed to our newsletter');
    }
}
