<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
/*
    public function create()
    {
        return "dino";
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        post::create($data);
    }

    */
    public function index()
    {
        return back();
    }

    public function sendOfferNotification()
    {
        return "dinoo";
        $userSchema = User::first();

        $post = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
        //Notification::send($userSchema, new PostNotification($post));

        dd('Task completed!');
    }
}
