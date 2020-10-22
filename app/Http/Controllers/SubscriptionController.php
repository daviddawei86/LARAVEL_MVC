<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use App\User;
use Notification;

class SubscriptionController extends Controller
{
    public function getShow($id){
      $sub = Subscription::findOrFail($id);
      $list = $sub->user;

      return view('subscription.show', compact('list'));
    }
}
