<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Mail\SubscriptionEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => "required|email"
        ]);

        $email = $request->email;

        DB::transaction(function () use ($email) {
            $subscriber = Subscriber::where('email', $email)->first();

            if ($subscriber) {
                if ($subscriber->subscribe == 'cancel') {
                    $subscriber->subscribe = 'verify';
                    $subscriber->save();
                }
            } else {
                $subscriber =  Subscriber::create(
                    ['email' => $email]
                );
            }

            $subscriber->unsubscribeUrl = url('subscriber/cancel?email=') . $subscriber->email . "&unique=" . $subscriber->uuid;
            Mail::to($subscriber->email)->queue(new SubscriptionEmail($subscriber));
        });
        // Mail::to($subscriber->email)->later($when, new SubscriptionEmail($subscriber));
        session()->flash('success', 'You are subscribed to our Eventeefy newsletter');
        return redirect()->back();
    }

    public function cancelSubscription(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $subscriber = Subscriber::where('email', $request->email)->first();
        // dd($subscriber->uuid, $request->unique);
        if ($request->unique == $subscriber->uuid && $request->unique != null && $subscriber->uuid != null) {
            $subscriber->subscribe = 'cancel';
            $subscriber->save();
        } else {
            return response([
                'message' => 'You have not provided correct information'
            ]);
        }
        session()->flash('success', 'You are unsubscribed to our newsletter');
        return redirect('/subscriber/cancel-page');
    }
}
