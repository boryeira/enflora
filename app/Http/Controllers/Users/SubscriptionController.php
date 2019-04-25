<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Redirect;


class SubscriptionController extends Controller
{
    public function all()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
      return view('users.subscriptions.create')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
      $subs = new Subscription();
      $subs->user_id = $user->id;
      $subs->monthly_quantity = $request->monthly_quantity;
      $subs->monthly_fee = $request->monthly_fee;
      $subs->monthly_dues = $request->months;;
      $subs->status = 1;
      $subs->subscription_start = Carbon::parse($request->subscription_start);
      $subs->subscription_end = Carbon::parse($request->subscription_start)->addMonths(6);
      $subs->save();

      return Redirect::route('users.show',['user'=>$user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
