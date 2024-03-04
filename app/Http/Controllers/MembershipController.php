<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->subscriptions->count()) {
            return redirect('/');
        }

        return view('pages.membership');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $plan)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email:rfc,dns',
            'name' => 'string|required',
            'address' => 'string|required',
            'postal_code' => 'string|required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('danger', 'Something Went Wrong! Please Check the Field...');
        }

        if(auth()->user()->subscriptions->count()) {
            return redirect('/order/payment/cancel')->withErrors('message', 'Users already have subscription!');
        }

        $plan = SubscriptionPlan::where('name', $plan)->firstOrFail();

        $request->user()->newSubscription($plan, $plan->stripe_price_id)->create($request->token);

        return view("pages.payment_success");
    }

    /**
     * Display the specified resource.
     */
    public function show($plan)
    {
        if(auth()->user()->subscriptions->count()) {
            return redirect('/');
        }

        $intent = auth()->user()->createSetupIntent();

        return view('pages.payment_form', ['intent' => $intent, 'plan' => $plan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
