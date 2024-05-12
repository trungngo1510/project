<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Http\Requests\admin\CountryRequest;
class CountryController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = country::all();

    return view('admin/country/country', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin/country/addCountry');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CountryRequest $request)
  {

    $data =   new country;
    $data->name = $request->title;
    if ($data->save()) {
      return redirect()->back()->with('success', __('Add Title Success.'));
    } else {
      return redirect()->back()->with('success', __('Add Title Error.'));
    }
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
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
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    country::where('id', $id)->delete();
    return redirect()->back()->with('success', __('Delete Title Success.'));
  }
}
