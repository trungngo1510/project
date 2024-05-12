<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\orderHistory;
use Illuminate\Support\Facades\Auth;
class MailController extends Controller
{
   public function index(Request $request){

    $user = User::find(Auth::id());
    $cart = Session::get('cart', []);
    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
        
    }
    try{
        Mail::to($user->email)->send(new MailNotify($cart,$totalPrice));
      
    }catch(Exception $th){
        var_dump($th);
        return redirect()->back()->with('success',__('Send Mail Error.'));  
    }
    $orderHistory = new orderHistory();
    $orderHistory->email = $user->email;
    $orderHistory->phone= $user->phone;
    $orderHistory->name=$user->name;
    $orderHistory->id_user=$user->id;
    $orderHistory->price=$totalPrice;
    $orderHistory->save();
    return redirect('/frontend/checkout')->with('success',__('Send Mail success.'));
   }
   
}
