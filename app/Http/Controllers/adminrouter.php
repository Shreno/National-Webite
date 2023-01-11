<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

//DB Connect
use App\Users;
use App\Icons;
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

use App\Blogcat;
use App\Blogs;
use App\Blogcomm;
use App\Response;
use App\Media;
use App\Health;
use App\Projects;
use App\News;
use App\Faq;

class adminrouter extends Controller
{
	public function __construct(){
       $this->middleware('auth');
   	}
    public function index(){
    	return view('admin/index');
    }
    public function profile(){
    	$icons=Icons::all();
    	$prof=Compprof::all();
    	return view('admin/profile',compact('icons','prof'));
    }
    public function team(){
    	$team=Team::all();
    	return view('admin/team',compact('team'));
    }
    public function mission(){
    	$mission=Mission::where('id',1)->first();
    	return view('admin/mission',compact('mission'));
    }
    public function stat(){
    	$stat=Stats::all();
    	return view('admin/stat',compact('stat'));
    }
    public function header(){
    	$header=Headers::all();
    	return view('admin/header',compact('header'));
    }
    public function main(){
    	$main=Main::where('id',1)->first();
    	return view('admin/main',compact('main'));
    }
    public function history(){
    	$icons=Icons::all();
    	$hist=History::all();
    	return view('admin/history',compact('icons','hist'));
    }
    public function clients(){
    	$clients=Clients::all();
    	// $tists=Tistimonials::all();
    	return view('admin/clients',compact('clients'));
    }
    public function Testimonials(){
    	// $clients=Clients::all();
    	$tists=Tistimonials::all();
    	return view('admin/Tistimonials',compact('tists'));
    }
    public function aboutmain(){
    	$aboutm=Aboutm::all();
    	$icons=Icons::all();
    	return view('admin/aboutmain',compact('aboutm','icons'));
    }
    public function contact(){
    	$contact=Contact::where('id',1)->first();
    	return view('admin/contact',compact('contact'));
    }
    public function messages(){
    	$messages=Messages::orderBy('id','desc')->paginate(50);
    	Messages::where('seen',0)->update(['seen'=>1]);
    	return view('admin/messages',compact('messages'));
    }
    public function agents(){
    	$agents=Agents::all();
    	return view('admin/agents',compact('agents'));
    }
    public function Faq(){
    	// $icons=Icons::all();
    	$Faqs=Faq::all();
    	return view('admin/Faq',compact('Faqs'));
    }
    public function blogs(){
        $blcat=Blogcat::all();
        $blogs=Blogs::all();
        $comments=Blogcomm::where('seen',0)->get();
        return View('admin/blogs')->withBlcat($blcat)->withBlogs($blogs)->withComments($comments);
    }
    public function upload(){
        return View('/admin/upload')->withUrl('');
    }
    public function comments(){
        $allcomments=Blogcomm::join('blogs', 'blogs.id', '=', 'blog_comment.blog')
        ->orderby('blog_comment.id','desc')
        ->select('blog_comment.*','blogs.title as blogtitle')
        ->get();
        Blogcomm::where('seen',0)->update(['seen'=>1]);
        $comments=Blogcomm::where('seen',0)->get();
        return View('admin/comments')->withComments($comments)->withAllcomments($allcomments);
    }
    public function response(){
    	$response=Response::where('id',1)->first();
    	return view('admin/response',compact('response'));
    }
    public function media(){
    	$media=Media::all();
    	return view('admin/media',compact('media'));
    }
    public function health(){
    	$hel=Health::where('id',1)->first();
    	return view('admin/health',compact('hel'));
    }
    public function projects(){
    	$pro=Projects::all();
    	return view('admin/projects',compact('pro'));
    }
    public function news(){
    	$news=News::orderBy('id','desc')->paginate(50);
    	return view('admin/news',compact('news'));
    }
    public function admin(){
    	$users=Users::where('id',1)->first();
    	return view('admin/admin',compact('users'));
    }
}
