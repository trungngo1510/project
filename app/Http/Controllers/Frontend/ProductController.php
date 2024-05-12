<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\brand;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::orderBy('created_at', 'DESC')->paginate(6);
        $category = category::all();
        $brand = brand::all();
        return view('frontend.product.index', compact('product', 'category', 'brand'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.product.cart');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $product = product::find($id);
        $image = json_decode($product->image);
        $one_img = $image[0];

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'image' => $one_img,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);

        if (isset($cart)) {
            $total_qty = 0;
            foreach ($cart as $value) {
                $total_qty += $value['quantity'];
            }
            echo $total_qty;
        }
    }



    public function ajax_up_cart(Request $request)
    {

        $carts = session()->get('cart');

        $id = $request->id;
        $new_qty = $request->new_qty;
        if (isset($carts[$id])) {
            $carts[$id]['quantity'] = $new_qty;
            session()->put('cart', $carts);
        }
    }



    public function ajax_down_cart(Request $request)
    {
        $cart = session()->get('cart');
        $id = $request->id;
        $new_qty = $request->new_qty;
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $new_qty;
            session()->put('cart', $cart);
        }
    }



    public function ajax_delete_cart(Request $request)
    {
        $cart = session()->get('cart');
        $id = $request->id;
        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);


            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }


            return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::find($id);
        $image = json_decode($product->image);
        $brands = brand::all();

        return view('frontend.product.product-detail', compact('product', 'image', 'brands'));
    }




    public function checkout()
    {
        $user = User::find(Auth::id());
        return view('frontend.product.checkout', compact('user'));
    }


    public function register(Request $request)
    {

        $data = $request->all();
        $file = $request->avatar;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        if ($user) {
            if (!empty($file)) {
                $file->move('public/user/avatar', $file->getClientOriginalName());
            }
            $cart = Session::get('cart', []);
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
            Mail::to($user->email)->send(new MailNotify($cart, $totalPrice));

            Auth::login($user);
            return redirect('/frontend/checkout')->with('success', __('Send Mail success.'));
        } else {
            return redirect()->back()->with('success', __('Register Error.'));
        }
    }
}
