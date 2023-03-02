<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contectus;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use COM;
use Illuminate\Support\Facades\auth;
use phpDocumentor\Reflection\Types\Null_;
use Reflector;
use Str;
use Whoops\Run;

class ContectUsController extends Controller
{
    public function contectus(Request $request)
    {
        if ($request->isMethod('POST')) {


            if(auth::user()->id ==  Null)
           
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',

            ]);

            $cart = Contectus::create([
                'user_id' => auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,

            ]);
            $data = ['name' => $request['name'], 'data' => $request['message']];
            $user['to'] = 'hardikbhanderi9898@gmail.com';
            $user['subject'] = $request['subject'];
            Mail::send('mail', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject($user['subject']);
            });
            return  redirect()->route('user.dashboard');
        }
        return  view('Frontend.contectus.index');
    }
    public function aboutus(Request $request)
    {
        
        return  view('Frontend.about us.index');
    }
    public function faqs(Request $request)
    {
        
        return  view('Frontend.faqs.index');
    }
}
