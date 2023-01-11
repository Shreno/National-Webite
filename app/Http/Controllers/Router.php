<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use View;
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

class Router extends Controller
{
	public function __construct(){
        //Share To All Views
        $header = Headers::all();
        View::share('header', $header);
        $main=Main::where('id',1)->first();
        View::share('main', $main);
    }
    public function index(){
    	//First User
    	$chk=Users::where('id',1)->first();
    	if(empty($chk)){
    		Users::insert(['email'=>'admin@touch.com','password'=>Hash::make('Touch2019')]);
    	}
    	$compprof=Compprof::all();
    	$team=Team::all();
    	$mission=Mission::where('id',1)->first();
    	$stat=Stats::all();
    	$hist=History::all();
    	$clients=Clients::all();
    	$tists=Tistimonials::all();
    	return view('index',compact('compprof','team','stat','mission','hist','clients','tists'));
    }
    public function about(){
    	$stat=Stats::all();
    	$tists=Tistimonials::all();
    	$aboutm=Aboutm::all();
    	$agents=Agents::all();
    	$wedo=Wedo::all();
    	$resp=Response::where('id',1)->first();
    	$pro=Projects::orderBy('id','desc')->get();
    	return view('about',compact('stat','tists','aboutm','agents','wedo','resp','pro'));
    }
    public function health(){
    	$hel=Health::where('id',1)->first();
    	return view('health',compact('hel'));
    }
    public function projects(){
    	$pro=Projects::orderBy('id','desc')->get();
    	return view('projects',compact('pro'));
    }
    public function project($id){
    	$pro=Projects::where('id',$id)->first();
    	if(empty($pro)){
    		return redirect('/projects');
    	}
    	return view('project',compact('pro'));
    }
    public function media(){
    	$med=Media::all();
    	return view('media',compact('med'));
    }
    public function services(){
    	$aboutm=Aboutm::all();
    	return view('services',compact('aboutm'));
    }
    public function blogs(){
    	$blog=Blogs::orderBy('id','desc')->get();
    	$lastblog=Blogs::orderBy('id','desc')->take(4)->get();
    	$categories=Blogcat::all();
    	foreach ($categories as $cat) {
    		$blogscat=Blogs::where('category',$cat->id)->get();
    		$blogsoncat[]=count($blogscat);
    	}
    	return view('blogs',compact('blog','lastblog','categories','blogsoncat'));
    }
    public function blog($id){
    	$blog=Blogs::where('id',$id)->first();
    	if(empty($blog)){
    		return redirect('/blogs');
    	}
    	$lastblog=Blogs::orderBy('id','desc')->take(4)->get();
    	$count=$blog->visits;
    	$count++;
    	Blogs::where('id',$id)->update(['visits'=>$count]);
    	$categories=Blogcat::all();
    	foreach ($categories as $cat) {
    		$blogscat=Blogs::where('category',$cat->id)->get();
    		$blogsoncat[]=count($blogscat);
    	}
    	$comments=Blogcomm::where('blog',$id)->where('approve',1)->get();
    	return View('blog')->withBlog($blog)->withCategories($categories)->withBlogsoncat($blogsoncat)
    	->withLastblog($lastblog)->withComments($comments);
    }
    public function contact(){
    	$contact=Contact::where('id',1)->first();
    	return view('contact',compact('contact'));
    }
}
