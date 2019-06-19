<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use Redirect;
use Auth;
use Exception;
use Session;
use Mail;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      $users = User::all();
      return view('users.index')->with('users',$users);
  }

  public function create()
  {
      return view('users.create');
  }

  public function store(Request $request)
  {
      $provisional = Str::random(8);

      $user = new User();
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->rut = $request->rut;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->role_id = 2;
      $user->password = Hash::make($provisional);
      $user->provisional = $provisional;


      if ($request->recipe) {
          request()->file('recipe')->storeAs('public/recipes', $user->id.'.jpg');
          $user->recipe = url('/').'/storage/recipes/'.$user->id.'.jpg';
      }
      
    
      $user->save();
      Mail::to($user)->send(new Welcome($user));
      return redirect::route('users.show',['user'=>$user->id]);
  }

  public function show(User $user)
  {
      return view('users.show')->with('user',$user);
  }
  public function subscriptionCreate(User $user)
  {
      return view('users.subscriptions.create')->with('user',$user);
  }
  public function subscriptionStore(Request $request, User $user)
  {
      $subs = new Subscription();
      $subs->user_id = $user->id;
      $subs->monthly_quantity = $user->id;
      $subs->user_id = $user->id;
      $subs->user_id = $user->id;
      $subs->user_id = $user->id;

      return view('users.show')->with('user',$user);
  }
  public function passwordUpdate(Request $request)
  {

    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->email_verified_at = now();
    $user->save();

    return Redirect::back();
  }

}
