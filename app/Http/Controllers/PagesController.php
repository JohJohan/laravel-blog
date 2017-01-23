<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use Session;
use Mail;

class PagesController extends Controller {

    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->limit(4)->get();

        return view('pages.index')->withPosts($posts);
    }

    public function getAbout(){
        $first = 'Johan';
        $last = 'Vlaar';
        $full = $first . ' ' . $last;
        $email = 'johan.vlaar.1994@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $full;
        // return view('pages.about')->with("fullname", $full)->with("last", $last);
        // return view('pages.about')->withFullname($full);
        return view('pages.about')->withData($data);
    }

    public function getContact(){
        return view('pages.contact');
    }
    public function postContact(Request $request){
        $this->validate($request, array(
            'email'     => 'required|email',
            'subject'   => 'required|min:3',
            'message'   => 'required|min:10'
        ));

        $data = array(
            'email'       => $request->email,
            'subject'     => $request->subject,
            'bodyMessage' => $request->message
        );
        // return $this->view('emails.orders.shipped')
        //            ->attach('/path/to/file');

        Mail::send('emails.contact', $data, function($message) use ($data){
                $message->from($data['email']);
                $message->to('0603fbc5ab-ead1b1@inbox.mailtrap.io');
                $message->subject($data['subject']);
        });

        Session::flash('success', 'The mail is been send');

        return redirect('contact');
    }
}
