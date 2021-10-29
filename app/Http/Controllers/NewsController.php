<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\News;

class NewsController extends Controller
{
    //
    public function index()
    {
    	$news = News::paginate(10);
    	return view('backend.news.index',compact('news'));
    }

    public function create()
    {
    	return view('backend.news.create');
    }

     public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3072',

        ]);

        $storagepath = $request->file('image')->store('public/news');
        $fileName = basename($storagepath);

        $data = $request->all();
        $data['image'] = $fileName;

        News::create($data);

        return redirect()->route('admin-news-list');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$news = News::whereid($id)->first();
        //
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:3072',

        ]);

        $new = News::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/news/".$new->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/news');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $new->fill($data);
        $new->save();

        return redirect()->route('admin-news-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $news = News::findOrFail($id);
        $file_path = "public/news/".$news->image;
            Storage::delete($file_path);
        $news->delete();
        return redirect()->back();
    }
}
