<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SiteMeta;
use App\Slider;
use App\PointKey;
use App\Event;
use App\Product;
use App\News;
use App\Room;
use App\Restauration;
use App\Category;


class WelcomeController extends Controller
{
    //
    public function home()
    {

        $sliders = Slider::orderBy('order','asc')->get()->take(10);
        $ourService = SiteMeta::where('meta_key', 'our_service_text')->first();
        $pointKeys = PointKey::orderBy('created_at','desc')->paginate();

        $rooms = Room::with('category')->orderBy('created_at','desc')->get()->take(3);
        $roomz = Room::with('category')->first();


        $news = DB::table('news')->orderBy('created_at','desc')->first();
        $newz = DB::table('news')->first();

        $restaurations = DB::table('restaurations')->orderBy('created_at','desc')->first();
        $restaurationz = DB::table('restaurations')->first();

        $eventz = DB::table('events')->orderBy('created_at','desc')->first();
        $events = Event::orderBy('created_at','desc')->get()->take(4);

        $images = SiteMeta::where('meta_key','gallery')->get()->take(10);


        return view('welcome', compact(
            'sliders',
            'ourService',
            'pointKeys',
            'rooms',
            'roomz',
            'news',
            'newz',
            'restaurations',
            'restaurationz',
            'events',
            'eventz',
            'images'
            
        ));
    }

    /**
     * subscriber  manage
     * @return mixed
     */
    public function subscribe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => 'Emails is invalid!'
            ];

            return $response;
        }

        $subscriber = SiteMeta::create([
            'meta_key' => 'subscriber',
            'meta_value' => $request->get('email')
            ]);

        return back()->with('success','Thank your for subscribing us.');


    }

    public function gallery()
    {

        $rooms = Room::with('category')->orderBy('created_at','desc')->get();

        $restaurationz = DB::table('restaurations')->orderBy('created_at','desc')->first();

        $images = SiteMeta::where('meta_key','gallery')->get();

        return view('frontend.gallery',compact(['restaurationz','rooms','images']));
    }

    public function news()
    {
        $pointKeys = PointKey::orderBy('created_at','desc')->paginate();
        $news = DB::table('news')->orderBy('created_at','desc')->get();
        $newz = DB::table('news')->first();
        $events = Event::orderBy('created_at','desc')->get();
        $eventz = DB::table('events')->orderBy('created_at','desc')->first();

        return view('frontend.news',compact(['pointKeys','news','newz','events','eventz']));
    }

    public function event(){
        $news = DB::table('news')->orderBy('created_at','desc')->first();
        $pointKeys = PointKey::orderBy('created_at','desc')->paginate();
        $eventz = DB::table('events')->orderBy('created_at','desc')->first();
        $events = Event::orderBy('created_at','desc')->get();

        return view('frontend.event',compact(['news','eventz','events','pointKeys']));
    }

    public function room(){
        $rooms = Room::with('category')->orderBy('created_at','desc')->get();
        $roomz = Room::with('category')->first();

        $restaurations = DB::table('restaurations')->orderBy('created_at','desc')->first();
        $restaurationz = DB::table('restaurations')->first();

        return view('frontend.room',compact(['restaurations','restaurationz','rooms','roomz']));
    }

    public function restauration(){
        $restaurations = DB::table('restaurations')->orderBy('created_at','desc')->get();
        $restaurationz = DB::table('restaurations')->first();

        $eventz = DB::table('events')->orderBy('created_at','desc')->first();
        $events = Event::orderBy('created_at','desc')->get();

        return view('frontend.restauration',compact(['restaurations','restaurationz','events','eventz']));
    }

    public function contactUs(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {//

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'name' => 'required|min:2|max:255',
                'message' => 'required|min:5|max:500',
            ]);

            if ($validator->fails()) {
                $response = [
                    'info' => 'error',
                    'message' => 'Input is invalid! Check it again!'
                ];

                return response()->json($response);
            }

            //now send mail
            $data = [
                'from' =>  $request->get('email'),
                'to'  => env('MAIL_RECEIVER','ambazamarcellin2001@gmail.com'),
                'body' => $request->get('message')
            ];

          Mail::send(array(), array(), function ($message) use ($data) {
                $message->to($data['to'])
                ->from($data['from'])
                ->setBody($data['body']);
            });

            $response = [
                'info' => 'success',
                'message' => 'Mail delivered to receiver. Will contact you soon.'
            ];

            return response()->json($response);


        }
        //for get request
        $address = SiteMeta::where('meta_key', 'contact_address')->first();
        $phone = SiteMeta::where('meta_key', 'contact_phone')->first();
        $email = SiteMeta::where('meta_key', 'contact_email')->first();
        $latlong = SiteMeta::where('meta_key', 'contact_latlong')->first(); 
        return view('frontend.contact_us', compact('address', 'phone', 'email'));

    }

    /* FAQ
     * @return mixed
     */
    public function faq()
    {

        $faqs = SiteMeta::where('meta_key','faq')->get();
        return view('frontend.faq', compact('faqs'));

    }
}
