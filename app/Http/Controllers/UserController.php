<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscription;
use Auth;
use Mail;

use Notification;

class UserController extends Controller
{
    
  public function getShow($id = null){
      if(!$id){
        $id = Auth::id();
      }
      $user = User::findOrFail($id);//()->attach(1);//->where('id',10);
      //$list = App\Post::find(1)->comments()->where('title', 'foo')->first();
      $list = $user->movies;//->where('User.email','Fbord@gmail.com')->get();

      return view('user.show', compact('list'));
  }

  public function getRols($id = null){
    if(!$id){
      $id = Auth::id();
    }
    $user = User::findOrFail($id);
    $list = $user->rols;

    return view('user.rols', compact('list'));
}

  public function getEdit($id = null){
    if(!$id){
      $id = Auth::id();
     }
     $user = User::findOrFail($id);
     $sub = Subscription::all();
    return view('user.edit', compact('user', 'sub'));
  }

      public function putEdit(Request $request,$id = null)
    {
      if(!$id){
        $id = Auth::id();
       }
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->id_subscription = $request->input('id_subscription');
        $user->userAge = $request->input('userAge');
        $user->save();
        Notification::success('Success message');
        
        return redirect('/user/edit/'.$id);
    }

    public function getCreate()
    {
      return view('home');
        return view('user.create');

    }

    public function postCreate(Request $request)
    {      
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->subscription = $request->input('subscription');
        $user->userAge = $request->input('userAge');
        $user->confirmation_code = str_random(25);
        $user->save();

        Mail::send('emails.confirmation_code', $request, function($message) use ($request) {
          $message->to($request->input('email'), $request->input('name'))->subject('Por favor confirma tu correo');
        });

        Notification::success('Success message');
        return redirect('user/add');
        
    }
    
    public function getVerify($code)
    {
    $user = User::where('confirmation_code', $code)->first();

    if (! $user){
      return redirect('/');
    }else{
      $user->confirmed = true;
      $user->confirmation_code = null;
      $user->save();
    }
    Notification::success('Has confirmado correctamente tu correo');
    return redirect('/login');
}
}