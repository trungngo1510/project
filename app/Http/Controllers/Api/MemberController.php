<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\api\LoginRequest;
use App\Http\Requests\api\MemberRequest;
use App\Http\Requests\api\UpdateProfileRequest;
use App\Models\User;
use Intervention\Image\Facades\Image as Image;

class MemberController extends Controller
{
    public $successStatus = 200;
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
        //
    }

    public function user()
    {
        $user = user::where('level', '1')->get();
        return response()->json([
            'user' => $user
        ]);
    }
    public function showlogin()
    {
        return view('frontend.member.login');
    }
    /**
     * Do login
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function login(LoginRequest $request)
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
            /** @var \App\Models\User $user **/  $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'token' => $token, 
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'response' => 'error',
                'errors' => ['errors' => 'invalid email or password'],
            ]);
        }
    }




    public function register(MemberRequest $request)
    {
        $data = $request->all();
        $file = $request->avatar;
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
        $data['password'] = bcrypt($data['password']);

        if ($getUser = User::create($data)) {
            if (!empty($file)) {
                $file->move('public/user/avatar', $file->getClientOriginalName());
            }
            return response()->json([
                'message' => 'success',
                $getUser
            ], JsonResponse::HTTP_OK);
        } else {
            return response()->json(['errors' => 'error sever'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        $getEmail =User::all()->where('email',$data['email'])->where('id','<>',$id)
        ->first();

        if($getEmail){
            $getEmail->toArray();
            return response()->json([
                'errors'=>['errors'=>'Email đã tồn tại'],
                'email'=>$getEmail['email']
            ]);
        }
        $file = $request->avatar;
        if($file){
            $data['avatar']=$file->getClientOriginalName();
        }else{
            $data['avatar']=$user->avatar;
        }
        
        if($data['password']){
            $data['password']=bcrypt($data['password']);
        }else{
            $data['password']=$user->password;
        }

        if($getUser = $user->update($data)){
            if($file){
                Image::make($file)->save(public_path('upload/user/avatar/').$data['avatar']);
            }
            $data['id'] = $id;
          
            return response()->json([
                'response'=>'success',
              
                'data'=>$data
            ]);
        }else{
            return response()->json([
                'errors'=>'error update'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
