<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteMeta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Helpers\AppHelper;

class SiteController extends Controller
{
    //
     public function dashboard()
    {

        $subscribers = SiteMeta::where('meta_key', 'subscriber')->count();
        $photos = SiteMeta::where('meta_key', 'gallery')->count();
        return view('backend.site.dashboard', compact(
            'subscribers',
            'photos'
        ));
    }
    /**
     * subscriber  manage
     * @return mixed
     */
    public function subscribe(Request $request)
    {
        //for get request
        $subscribers = SiteMeta::where('meta_key', 'subscriber')->get();
        return view('backend.site.home.subscribers', compact('subscribers'));
    }

      public function serviceContent(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {//
            $this->validate($request, [
                'meta_value' => 'required|min:5|max:500'

            ]);

            //now crate or update model
            $content = SiteMeta::updateOrCreate(
                ['meta_key' => 'our_service_text'],
                $request->all()
            );
            return redirect()->route('site.service')->with('success', 'Contents saved!');
        }

        //for get request
        $content = SiteMeta::where('meta_key', 'our_service_text')->first();
        return view('backend.site.home.service', compact('content'));
    }


    /**
     * About gallery content manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gallery()
    {


        //for get request
        $images = SiteMeta::where('meta_key','gallery')->paginate(20);

        return view('backend.site.gallery.content', compact('images'));
    }
    /**
     * About gallery content add
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function galleryAdd(Request $request)
    {

        //for save on POST request
        if ($request->isMethod('post')) {
            //validate form
            $messages = [
                'image.max' => 'The :attribute size must be under 2MB.',
            ];
            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png|max:3072',
            ]);

            $storagepath = $request->file('image')->store('public/gallery');
            $fileName = basename($storagepath);

            //now crate
            SiteMeta::create(
                [
                    'meta_key' => 'gallery',
                    'meta_value' => $fileName
                ]
            );

            return redirect()->route('site.gallery_image')->with('success', 'Image uploaded');
        }

        return view('backend.site.gallery.image');
    }

    /**
     * About gallery content image delete
     * @return array
     */
    public function galleryDelete($id)
    {

        $image = SiteMeta::findOrFail($id);
        $file_path = "/public/gallery/".$image->meta_value;
            Storage::delete($file_path);
        Storage::delete('/public/gallery/' . $image->meta_value);
        $image->delete();

        return redirect()->back();
    }


    /**
     * contact us manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUs(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {//
            $this->validate($request, [
                'address' => 'required|min:5|max:500',
                'phone_no' => 'required|min:5|max:500',
                'email' => 'required|email|min:5|max:500',

            ]);

            //now crate or update model
            $content = SiteMeta::updateOrCreate(
                ['meta_key' => 'contact_address'],
                [ 'meta_value' => $request->get('address')]
            );
            $content = SiteMeta::updateOrCreate(
                ['meta_key' => 'contact_phone'],
                [ 'meta_value' => $request->get('phone_no')]
            );
            $content = SiteMeta::updateOrCreate(
                ['meta_key' => 'contact_email'],
                [ 'meta_value' => $request->get('email')]
            );
            $content = SiteMeta::updateOrCreate(
                ['meta_key' => 'contact_latlong'],
                [ 'meta_value' => $request->get('latlong')]
            );

            Cache::forget('site_metas');

            return redirect()->route('site.contact_us')->with('success', 'Information saved!');
        }

        //for get request
        
        $address = SiteMeta::where('meta_key', 'contact_address')->first();
        $phone = SiteMeta::where('meta_key', 'contact_phone')->first();
        $email = SiteMeta::where('meta_key', 'contact_email')->first();
        $latlong = SiteMeta::where('meta_key', 'contact_latlong')->first();        
        return view('backend.site.contact_us', compact('address', 'phone', 'email', 'latlong'));
    }

  
    public function faq(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {
            //validate form
            $this->validate($request, [
                'question' => 'required|min:5|max:255',
                'answer' => 'required|min:5',
            ]);

            $data = [
                'q' => $request->get('question'),
                'a' => $request->get('answer')
            ];
            //now crate
            SiteMeta::create(
                [
                    'meta_key' => 'faq',
                    'meta_value' => json_encode($data)
                ]
            );
            return redirect()->route('site.faq')->with('success', 'Record added!');
        }

        //for get request
        //for get request
        $faqs = SiteMeta::where('meta_key','faq')->paginate(env('MAX_RECORD_PER_PAGE',25));
        return view('backend.site.faq', compact('faqs'));
    }

    /**
     * Faq section content image delete
     * @return array
     */
    public function faqDelete($id)
    {

        $faq = SiteMeta::findOrFail($id);
        $faq->delete();

        return redirect()->route('site.faq')->with('success', 'Record Deleted!');
    }


    /**
     * setting section content manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {
            //validate form
            $messages = [
                'logo.max' => 'The :attribute size must be under 1MB.',
                'logo.dimensions' => 'The :attribute dimensions must be 82 X 72.',
                'logo2x.max' => 'The :attribute size must be under 1MB.',
                'logo2x.dimensions' => 'The :attribute dimensions must be 162 X 142.',
                'favicon.max' => 'The :attribute size must be under 1MB.',
                'favicon.dimensions' => 'The :attribute dimensions must be 32 X 32.',
            ];
            $this->validate($request, [
                'name' => 'required|min:5|max:255',
                'short_name' => 'required|min:3|max:255',
                'logo' => 'nullable|mimes:jpeg,jpg,png|max:1024|dimensions:min_width=82,min_height=72,max_width=82,max_height=72',
                'logo2x' => 'nullable|mimes:jpeg,jpg,png|max:1024|dimensions:min_width=162,min_height=142,max_width=162,max_height=142',
                'favicon' => 'nullable|mimes:png|max:512|dimensions:min_width=32,min_height=32,max_width=32,max_height=32',
                'facebook' => 'max:255',
                'instagram' => 'max:255',
                'twitter' => 'max:255',
                'youtube' => 'max:255',
            ]);

            if($request->hasFile('logo')) {
                $storagepath = $request->file('logo')->store('public/site');
                $fileName = basename($storagepath);
                $data['logo'] = $fileName;
            }

            if($request->hasFile('logo2x')) {
                $storagepath = $request->file('logo2x')->store('public/site');
                $fileName = basename($storagepath);
                $data['logo2x'] = $fileName;
            }

            if($request->hasFile('favicon')) {
                $storagepath = $request->file('favicon')->store('public/site');
                $fileName = basename($storagepath);
                $data['favicon'] = $fileName;
            }

            $data['name'] = $request->get('name');
            $data['short_name'] = $request->get('short_name');
            $data['facebook'] = $request->get('facebook');
            $data['instagram'] = $request->get('instagram');
            $data['twitter'] = $request->get('twitter');
            $data['youtube'] = $request->get('youtube');

            //now crate
            SiteMeta::updateOrCreate(
                ['meta_key' => 'settings'],
                ['meta_value' => json_encode($data)]
            );
            Cache::forget('website_settings');
            return redirect()->route('site.settings')->with('success', 'Record updated!');
        }

        //for get request
        $settings = SiteMeta::where('meta_key','settings')->first();
        $info = null;
        if($settings){
            $info = json_decode($settings->meta_value);
        }

        return view('backend.site.settings', compact('info'));
    }

}
