<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteMeta;
use App\Slider;
use App\PointKey;
use App\CommandDrink;
use App\Room;
use App\Event;
use Validator;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    //

    public function home()
    {

        $sliders = Slider::orderBy('order','asc')->get()->take(10);
        $ourService = SiteMeta::where('meta_key', 'our_service_text')->first();
        $pointKeys = PointKey::orderBy('created_at','desc')->paginate();
        return view('welcome', compact(
            'sliders',
            'ourService',
            'pointKeys'
            
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
        $response = [
            'success' => true,
            'message' => 'Thank your for subscribing us.'
        ];

        return $response;


    }

    public function gallery()
    {
        //for get request
        $images = SiteMeta::where('meta_key','gallery')->paginate(env('MAX_RECORD_PER_PAGE_FRONT',10));
        return view('frontend.gallery', compact('images'));

    }
    public function room(){
        $rooms = Room::orderBy('created_at','desc')->paginate(10);
        return view('frontend.room',compact('rooms'));
    }

    public function drink(){
        $drinks = CommandDrink::orderBy('created_at','desc')->paginate(20);
        return view('frontend.drink',compact('drinks'));
    }

    public function event(){
        $events = Event::orderBy('created_at','desc')->paginate(20);
        return view('frontend.event',compact('events'));
    }

    /* Contact Us
     * @return mixed
     */
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
                'to'  => env('MAIL_RECEIVER','marcelin@net-telecom.net'),
                'subject' => "[".$request->get('name')."]".$request->get('subject'),
                'body' => $request->get('message')
            ];

          Mail::send(array(), array(), function ($message) use ($data) {
                $message->to($data['to'])
                ->subject($data['subject'])
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
