<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\comment;
use App\Models\rate;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    // public function __construct()
    // {
    //  $this->middleware('auth');
    // }

    public function index()
    {
        $data = blog::orderBy('id', 'DESC')->paginate(3);


        return view('frontend.blog.listblog', compact('data'));
    }

    public function show_detail_blog($id)
    {
        $blog = blog::find($id);
        $previous = blog::where('id', '<', $id)->max('id');
        $next = blog::where('id', '>', $id)->min('id');

        $rateAvg = rate::where('id_blog', $id)->avg('rate');

        $dataCommentUser = DB::table('comment')
            ->join('users', 'comment.id_user', '=', 'users.id')
            ->select('comment.*', 'users.name', 'users.avatar')
            ->where('id_blog', $id)->get()->toArray();
            
        return view('frontend.blog.detailblog', compact('blog', 'rateAvg', 'dataCommentUser'))
            ->with('previous', $previous)->with('next', $next);
    }

    public function rate(Request $request)
    {

        $data = $request->all();
        if (empty($data['id_user'])) {
            $data['id_user'] = Auth::id();
        } else {
            $data['id_user'] = Auth::id();
        }
        $rate = Rate::create($data);
        if ($rate) {
            return response()->json(['msg' => "thanh cong"]);
        }
    }


    public function comment(Request $request)
    {
        $data = $request->all();
        
        if ($data['up'] == 1) {
            if (comment::create($data)) {
                $id_user = $data['id_user'];
                $dataCommentUser = DB::table('comment')
                    ->join('users', 'comment.id_user', '=', 'users.id')
                    ->where("id_blog", $data['id_blog'])
                    ->Where("id_user", $id_user)
                    ->orderBy('comment.created_at', 'DESC')->limit(1)
                    ->get()->toArray();

              
                return response()->json([
                    'msg' => "thanh cong",
                    'data' => $dataCommentUser,
                    'up' => 1
                ]);
            } 
        }else if ($data['up'] == 2) {
            if (!empty($data['level'])) {
                $data['level'] = $data['cmt_id'];
            } else {
               
                $data['level'] = $data['cmt_id'];
            }
            if (comment::create($data)) {
               
                $id_user = $data['id_user'];

               
                $dataCommentUser = DB::table('comment')
                    ->join('users', 'comment.id_user', '=', 'users.id')
                    ->where("id_blog", $data['id_blog'])
                    ->Where("id_user", $id_user)
                    ->orderBy('comment.created_at', 'DESC')->limit(1)
                    ->get()->toArray();

          
                return response()->json([
                    'msg' => "thanh cong",
                    'data' => $dataCommentUser,
                    'up' => 2
                ]);
            }
        }
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
