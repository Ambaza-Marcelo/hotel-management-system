<?php

namespace App\Http\Controllers;

use App\User;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create(){
        return view('hotels.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:100',
            'adress' =>'required|min:5|max:255',
            'about' =>'required|min:5|max:255',
            'language' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:2048|dimensions:min_width=1900,min_height=1200',
            'theme'       => 'flatly'
        ]);

        $storagepath = $request->file('image')->store('public/logos');
        $fileName = basename($storagepath);
        $data = $request->all();
        $data['code'] = date("y").substr(number_format(time() * mt_rand(), 0, '', ''), 0, 6);
        $data['image'] = $fileName;

        Hotel::create($data);

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
         $request->validate([
            'name' => 'required|min:4|max:255',
            'adress' => 'required|min:5|max:255',
            'about' => 'required|min:5|max:255',
            'image' => 'mimes:jpeg,jpg,png|max:2048|dimensions:min_width=1900,min_height=1200',

        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/logos/".$hotel->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/logos');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $hotel->fill($data);
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
