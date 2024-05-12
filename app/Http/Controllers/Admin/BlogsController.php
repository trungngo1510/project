<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Http\Requests\admin\BlogRequest;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = blog::all();
        return view('admin.blog.blogs', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.addBlogs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        $file = $request->image;
        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }
        if (blog::create($data)) {
            if (!empty($file)) {
                $file->move('public/imgblog', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Add Blogs success.'));
        } else {
            return redirect()->back()->with('success', __('Add Blogs Error.'));
        }
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
    public function edit($id)
    {
        $blog = blog::where('id', $id)->get();
        return view('admin.blog.editBlogs', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id)
    {
        $blog = blog::findOrFail($id);
        $data = $request->all();
        $file = $request->image;
        if (!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }
        if ($blog->update($data)) {
            if (!empty($file)) {
                $file->move('public/imgblog', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Upload Blogs success.'));
        }
        return redirect()->back()->with('success', __('Upload Blogs Error.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        blog::where('id', $id)->delete();
        return redirect()->back()->with('success', __('Delete blog Success.'));
    }
}
