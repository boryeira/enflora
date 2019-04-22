<?php

namespace App\Observers;
use App\Models\Subscription;
use App\Models\SubscriptionDue;
use Carbon\Carbon;

class SubscriptionObserver
{
  public function created(Subscription $subscription)
  {
    for ($i=0; $i < $subscription->monthly_dues; $i++) {
      $subs_due = new SubscriptionDue();
      $subs_due->subscription_id = $subscription->id;
      $subs_due->fee = $subscription->monthly_fee;
      $subs_due->quantity = $subscription->monthly_quantity;
      $subs_due->start = $subscription->subscription_start->addMonth($i);
      $subs_due->end = $subscription->subscription_start->addMonth($i+1)->subDay();
      $subs_due->due = $i+1;
      $subs_due->save();
    }
  }
}
