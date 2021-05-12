<?php

namespace App\Http\Controllers;

use App\User;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\HotelRequest;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $hotels = Hotel::orderBy('created_at', 'desc')->paginate();

      return view('hotels.index', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {

        Hotel::create([
            'name'        => $request->name,
            'adress' => $request->adress,
            'about'       => $request->about,
            'logo'  => $request->logo,
            'language'      => $request->language,
            'code'        => date("y").substr(number_format(time() * mt_rand(), 0, '', ''), 0, 6),
            'theme'       => 'flatly'
        ]);

        return redirect()->route('hotels.index')->with('status', __('Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotel_id)
    {
      $admins = User::byHotel($hotel_id)->where('role','admin')->get();
      return view('hotel.admin-list',compact('admins'));
    }

    public function edit(Hotel $hotel) {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel) {
        $hotel->name = $request->name;
        $hotel->about = $request->about;
        $hotel->save();

        return redirect()->route('hotels.index');
    }

    public function changeTheme(Request $request){
      $tb = Hotel::find($request->s);
      $tb->theme = $request->hotel_theme;
      $tb->save();
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // return (Hotel::destroy($id))?response()->json([
      //   'status' => 'success'
      // ]):response()->json([
      //   'status' => 'error'
      // ]);
    }
}
