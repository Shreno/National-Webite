<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

//DB Connect
use App\Users;
use App\Compprof;
use App\Team;
use App\Mission;
use App\Stats;
use App\Headers;
use App\Main;
use App\History;
use App\Clients;
use App\Tistimonials;
use App\Aboutm;
use App\Contact;
use App\Messages;
use App\Agents;
use App\Wedo;
use App\Blogcat;
use App\Blogs;
use App\Blogcomm;
use App\Response;
use App\Media;
use App\Health;
use App\Projects;
use App\News;

class process extends Controller
{
	public function send(Request $req){
		$valarr=[
	       'name'=>'required|min:5|max:60',
	       'email'=>'required|min:5|max:70|email',
	       'phone'=>'required|min:10|max:30',
	       'subject'=>'required|min:5|max:70',
	       'message'=>'required'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $email=$req->input('email');
	    $phone=$req->input('phone');
	    $subject=$req->input('subject');
	    $message=$req->input('message');
	    Messages::insert(['name'=>$name,'email'=>$email,'phone'=>$phone,'subject'=>$subject,'message'=>$message]);
	    session()->push('m','success');
	    session()->push('m','Message Sent to Admin Successfully!');
	    return back();
	}
	public function comm(Request $req,$id){
		$valarr=[
	       'name'=>'required|min:5|max:60',
	       'email'=>'required|min:5|max:70|email',
	       'comment'=>'required'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $email=$req->input('email');
	    $comment=$req->input('comment');
	    Blogcomm::insert(['name'=>$name,'email'=>$email,'comment'=>$comment,'blog'=>$id,'seen'=>0,'approve'=>0]);
	    session()->push('m','warning');
	    session()->push('m','Comment Sent to Admin To Review!');
	    return back();
	}
	public function ar(){
		Session::put('lang', 'ar');
		return back();
	}
	public function en(){
		Session::forget('lang');
		return back();
	}
	public function news(Request $req){
		$valarr=[
	       'email'=>'required|min:5|max:70|email|unique:newsletter,email'
	    ];
	    $this->validate($req,$valarr);
	    $email=$req->input('email');
	    News::insert(['email'=>$email]);
	    session()->push('m','success');
	    session()->push('m','Your Email Added to our list!');
	    return back();
	}
}
