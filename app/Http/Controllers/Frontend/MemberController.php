<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\category;
use App\Models\brand;
use App\Models\product;
use Intervention\Image\Facades\Image as Image;
use App\Http\Requests\frontend\AddProductRequest;
use App\Http\Requests\frontend\UpdateProductRequest;
use App\Http\Requests\frontend\UpdateProfileRequest;
use App\Http\Requests\frontend\MemberRegisterRequest;
use App\Http\Requests\frontend\MemberLoginRequest;
class MemberController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.member.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(MemberRegisterRequest $request)
    {
        $data = $request->all();
        $file = $request->avatar;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        $data['password'] = bcrypt($data['password']);

        if (User::create($data)) {
            if (!empty($file)) {
                $file->move('public/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Register success.'));
        } else {
            return redirect()->back()->with('success', __('Register Error.'));
        }
    }

    public function showlogin()
    {
        return view('frontend.member.login');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/frontend/login');
    }

    public function login(MemberLoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
        if (Auth::attempt($login, $remember)) {
            $user = Auth::user();
            if ($user->level == 0) {
                session(['member' => $user->name]);
            } else {
                session(['admin' => $user->name]);
            }
            return redirect('frontend/index')->with('success', __('login success.'));
        } else {
            return redirect()->back()->with('success', __('login Error.'));
        }
    }

    public function showAccount()
    {
        return view('frontend.member.account.account');
    }


    public function getAccount()
    {


        $user =  User::where('id', Auth::id())->get();
        $country = country::all();
        return view('frontend.member.account.account_update', compact('user', 'country'));
    }

    public function update_account(UpdateprofileRequest $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'id_country' => $request->national,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $request->avatar,
        ];
        $file = $request->avatar;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('public/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Upload profile success.'));
        } else {
            return redirect()->back()->with('success', __('Upload profile error.'));
        }
    }




    public function showlist_product()
    {

        $product  =  product::where('id_user', auth()->user()->id)->get();
        return view('frontend.member.account.my-product', compact('product'));
    }

    public function add_product()
    {
        $category = category::all();
        $brands = brand::all();
        return view('frontend.member.account.add-product', compact('category', 'brands'));
    }

    public function post_product(AddProductRequest $request)
    {
        $product = new product;
        $product->id_user = auth()->user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_category = $request->category;
        $product->id_brand = $request->brand;
        $product->status = $request->status;
        $product->sale = $request->sale;
        $product->company = $request->company;
        $product->detail = $request->detail;

        $data = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = "hinh50_" . $image->getClientOriginalName();
                $name_3 = "hinh100_" . $image->getClientOriginalName();

                $path = public_path('public/imgProduct/' . $name);
                $path2 = public_path('public/imgProduct/' . $name_2);
                $path3 = public_path('public/imgProduct/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);

                $data[] = $name;
            }
        }

        $product->image = json_encode($data);
        $product->save();

        return back()->with('success', 'Your create has been successfully');
    }

    public function edit_product($id)
    {
        $category = category::all();
        $brand = brand::all();
        $product =  product::where('id', $id)->get();
        return view('frontend.member.account.edit-product', compact('product', 'category', 'brand'));
    }

    public function update_product(UpdateProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);


        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_category = $request->category;
        $product->id_brand = $request->brand;
        $product->status = $request->status;
        $product->sale = $request->sale;
        $product->company = $request->company;
        $product->detail = $request->detail;

        $data = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = "hinh50_" . $image->getClientOriginalName();
                $name_3 = "hinh100_" . $image->getClientOriginalName();

                $path = public_path('public/imgProduct/' . $name);
                $path2 = public_path('public/imgProduct/' . $name_2);
                $path3 = public_path('public/imgProduct/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);

                $data[] = $name;
            }
            $old_images = json_decode($product->image, true);
            $merged_images = array_merge($data, $old_images);
        } else {
            $merged_images = json_decode($product->image, true);
        }

        if ($request->has('delImage')) {
            $del_images = $request->input('delImage', []);
            $old_images = json_decode($product->image, true);

            foreach ($old_images as $key => $value) {

                if (in_array($value, $del_images)) {


                    unset($old_images[$key]);
                }
                $merged_images = $old_images;
            }
        }
        if (count($merged_images) > 3) {
            return back()->with('success', 'tối đa chỉ 3 hình ảnh');
        }

        $product->image = json_encode($merged_images);


        $product->save();
        return back()->with('success', 'Your Updated has been successfully');
    }

    public function destroy(string $id)
    {
        product::where('id', $id)->delete();
        return redirect()->back()->with('success', __('Delete blog Success.'));
    }
}
