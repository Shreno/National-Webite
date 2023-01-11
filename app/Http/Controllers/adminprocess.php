<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;

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
use App\Wedo;
use App\Blogcat;
use App\Blogs;
use App\Blogcomm;
use App\Response;
use App\Media;
use App\Health;
use App\Projects;
use App\News;
use App\Faq;

class adminprocess extends Controller
{
	public function __construct(){
       $this->middleware('auth');
   	}
    public function profile(Request $req){
    	$valarr=[
	       'title'=>'required|min:10|max:300',
	       'titlear'=>'required|min:10|max:300',
	       'block1title'=>'required|min:5|max:100',
	       'block2title'=>'required|min:5|max:100',
	       'block3title'=>'required|min:5|max:100',
	       'block1titlear'=>'required|min:5|max:100',
	       'block2titlear'=>'required|min:5|max:100',
	       'block3titlear'=>'required|min:5|max:100',
	       'block1content'=>'required|min:5|max:300',
	       'block2content'=>'required|min:5|max:300',
	       'block3content'=>'required|min:5|max:300',
	       'block1contentar'=>'required|min:5|max:300',
	       'block2contentar'=>'required|min:5|max:300',
	       'block3contentar'=>'required|min:5|max:300',
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $titlear=$req->input('titlear');
	    $show=$req->input('show');
	    $b1t=$req->input('block1title');
	    $b2t=$req->input('block2title');
	    $b3t=$req->input('block3title');
	    $b1ta=$req->input('block1titlear');
	    $b2ta=$req->input('block2titlear');
	    $b3ta=$req->input('block3titlear');
	    $b1c=$req->input('block1content');
	    $b2c=$req->input('block2content');
	    $b3c=$req->input('block3content');
	    $b1ca=$req->input('block1contentar');
	    $b2ca=$req->input('block2contentar');
	    $b3ca=$req->input('block3contentar');
	    $b1ic=$req->input('b1ic');
	    $b2ic=$req->input('b2ic');
	    $b3ic=$req->input('b3ic');
	    $shw='0';
	    if($show){
	    	$shw='1';
	    }
	    Compprof::where('id',1)->update(['title'=>$title,'title_ar'=>$titlear,'icon'=>$shw]);
	    Compprof::where('id',2)->update(['title'=>$b1t,'title_ar'=>$b1ta,'icon'=>$b1ic,'content'=>$b1c,'content_ar'=>$b1ca]);
	    Compprof::where('id',3)->update(['title'=>$b2t,'title_ar'=>$b2ta,'icon'=>$b2ic,'content'=>$b2c,'content_ar'=>$b2ca]);
	    Compprof::where('id',4)->update(['title'=>$b3t,'title_ar'=>$b3ta,'icon'=>$b3ic,'content'=>$b3c,'content_ar'=>$b3ca]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function addteam(Request $req){
  		$valarr=[
	       'name'=>'required|min:5|max:60',
	       'namear'=>'required|min:5|max:60',
	       'role'=>'required|min:2|max:60',
	       'rolear'=>'required|min:2|max:60',
	       'desc'=>'required|min:5|max:100',
	       'descar'=>'required|min:5|max:100',
	       'face'=>'max:100',
	       'twit'=>'max:100',
	       'goog'=>'max:100',
	       'in'=>'max:100',
	       'img'=>'required|max:2048|image'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $namear=$req->input('namear');
	    $role=$req->input('role');
	    $rolear=$req->input('rolear');
	    $desc=$req->input('desc');
	    $descar=$req->input('descar');
	    $face=$req->input('face');
	    $twit=$req->input('twit');
	    $goog=$req->input('goog');
	    $in=$req->input('in');
	    $img=$req->file('img');
	    Team::insert(['name'=>$name,'role'=>$role,'description'=>$desc,'name_ar'=>$namear,'role_ar'=>$rolear,'description_ar'=>$descar,'face'=>$face,'twit'=>$twit,'google'=>$goog,'in'=>$in]);
	    $get=Team::orderBy('id','desc')->first();
	    $photoName=$get->id;
        $photoName.='.'.$img->getClientOriginalExtension();
        $photoPath = public_path('/images/team');
        $img->move($photoPath,$photoName);
        Team::where('id',$get->id)->update(['image'=>$photoName]);
        session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function editteam(Request $req,$id){
  		$valarr=[
	       'name'=>'required|min:5|max:60',
	       'namear'=>'required|min:5|max:60',
	       'role'=>'required|min:2|max:60',
	       'rolear'=>'required|min:2|max:60',
	       'desc'=>'required|min:5|max:100',
	       'descar'=>'required|min:5|max:100',
	       'face'=>'max:100',
	       'twit'=>'max:100',
	       'goog'=>'max:100',
	       'in'=>'max:100',
	       'img'=>'max:2048|image'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $namear=$req->input('namear');
	    $role=$req->input('role');
	    $rolear=$req->input('rolear');
	    $desc=$req->input('desc');
	    $descar=$req->input('descar');
	    $face=$req->input('face');
	    $twit=$req->input('twit');
	    $goog=$req->input('goog');
	    $in=$req->input('in');
	    $img=$req->file('img');
	    $get=Team::where('id',$id)->first();
	    $photoPath = public_path('/images/team');
	    if(empty($get)){
	    	return redirect('/admin/team');
	    }
	    if(!empty($img)){
            $photoName=$get->id;
       		$photoName.='.'.$img->getClientOriginalExtension();
            $img->move($photoPath,$photoName);
        }else{
            $photoName=$get->image;
        }
	    Team::where('id',$id)->update(['name'=>$name,'role'=>$role,'description'=>$desc,'name_ar'=>$namear,'role_ar'=>$rolear,'description_ar'=>$descar,'face'=>$face,'twit'=>$twit,'google'=>$goog,'in'=>$in,'image'=>$photoName]);
        session()->push('m','success');
	    session()->push('m','Data Updated Successfully!');
  		return back();
  	}
  	public function remteam($id){
  		$get=Team::where('id',$id)->first();
  		@unlink('images/team/'.$get->image);
  		Team::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Person Removed Successfully!');
  		return back();
  	}
  	public function mission(Request $req){
    	$valarr=[
	       'title'=>'required|min:10|max:60',
	       'titlear'=>'required|min:10|max:60',
	       'content'=>'required',
	       'contentar'=>'required',
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $titlear=$req->input('titlear');
	    $show=$req->input('show');
	    $content=$req->input('content');
	    $contentar=$req->input('contentar');
	    $video=$req->input('video');
	    $shw='0';
	    if($show){
	    	$shw='1';
	    }
	    Mission::where('id',1)->update(['title'=>$title,'title_ar'=>$titlear,'show'=>$shw,'video'=>$video,'content'=>$content,'content_ar'=>$contentar]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function addstat(Request $req){
  		$valarr=[
	       'title'=>'required|min:5|max:60',
	       'titlear'=>'required|min:5|max:60',
	       'num'=>'required|integer'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $titlear=$req->input('titlear');
	    $num=$req->input('num');
	    Stats::insert(['title'=>$title,'title_ar'=>$titlear,'num'=>$num]);
        session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function editstat(Request $req,$id){
  		$valarr=[
	       'title'=>'required|min:5|max:60',
	       'titlear'=>'required|min:5|max:60',
	       'num'=>'required|integer'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $titlear=$req->input('titlear');
	    $num=$req->input('num');
	    Stats::where('id',$id)->update(['title'=>$title,'title_ar'=>$titlear,'num'=>$num]);
        session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function header(Request $req){
  		$valarr=[
	       'phone'=>'max:30',
	       'addr'=>'max:300',
	       'addrpr'=>'max:300',
	       'email'=>'max:100|email',
	       'fax'=>'max:30',
	       'face'=>'max:100',
	       'twit'=>'max:100',
	       'goog'=>'max:100',
	       'in'=>'max:100'
	    ];
	    $this->validate($req,$valarr);
	    $phone=$req->input('phone');
	    $addr=$req->input('addr');
	    $addrpt=$req->input('addrpt');
	    $email=$req->input('email');
	    $fax=$req->input('fax');
	    $face=$req->input('face');
	    $twit=$req->input('twit');
	    $goog=$req->input('goog');
	    $in=$req->input('in');
	    Headers::where('id',1)->update(['value'=>$phone]);Headers::where('id',2)->update(['value'=>$addr]);
	    Headers::where('id',3)->update(['value'=>$email]);Headers::where('id',4)->update(['value'=>$fax]);
	    Headers::where('id',5)->update(['value'=>$face]);Headers::where('id',6)->update(['value'=>$twit]);
	    Headers::where('id',7)->update(['value'=>$goog]);Headers::where('id',8)->update(['value'=>$in]);
	    Headers::where('id',9)->update(['value'=>$addrpt]);
       if(isset($req->logo))
       {
           $image=$req->logo;
            $photoPath = public_path('/images/logo');
                $phn='logo';
                $phn.='.'.$image->getClientOriginalExtension();
                $image->move($photoPath,$phn);
                Headers::where('id',10)->update(['value'=>$phn]);



       }
        session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function main(Request $req){
  		$valarr=[
	       'title'=>'required|min:5|max:100',
	       'content'=>'required|max:300',
	       'titlept'=>'required|min:5|max:100',
	       'contentpt'=>'required|max:300',
	       'image'=>'image|max:4096',
	    //    'background'=>'max:8192|image'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $content=$req->input('content');
	    $titlePT=$req->input('titlept');
	    $contentPT=$req->input('contentpt');
	    $image=$req->file('image');
	    // $background=$req->file('background');
	    // $show=$req->input('show');
	    $photoPath = public_path('/images/main');
	    $shw='0';
	    // if($show){
	    // 	$shw='1';
	    // }
	    $get=Main::where('id',1)->first();
	    if(!empty($image)){
            $phn='Main';
       		$phn.='.'.$image->getClientOriginalExtension();
            $image->move($photoPath,$phn);
        }else{
            $phn=$get->image;
        }
        // if(!empty($background)){
        //     $phn2='panner';
       	// 	$phn2.='.'.$background->getClientOriginalExtension();
        //     $background->move($photoPath,$phn2);
        // }else{
        //     $phn2=$get->background;
        // }
	    Main::where('id',1)->update(['title'=>$title,'content'=>$content,'title_PT'=>$titlePT,'content_PT'=>$contentPT,'image'=>$phn]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function histdata(Request $req){
  		$valarr=[
	       'title'=>'required|min:5|max:60',
	       'titlear'=>'required|min:5|max:60',
	       'title2'=>'required|min:5|max:200',
	       'title2ar'=>'required|min:5|max:200',
	       'img'=>'image|max:8192'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $title2=$req->input('title2');
	    $titlear=$req->input('titlear');
	    $title2ar=$req->input('title2ar');
	    $img=$req->file('img');
	    $show=$req->input('show');
	    $photoPath = public_path('/images/slide');
	    $shw='0';
	    if($show){
	    	$shw='1';
	    }
	    if(!empty($img)){
            $phn='slider';
       		$phn.='.'.$img->getClientOriginalExtension();
            $img->move($photoPath,$phn);
        }else{
        	$myimg=History::where('id',2)->first();
            $phn=$myimg->content;
        }
        History::where('id',1)->update(['content'=>$title2,'content_ar'=>$title2ar,'font'=>$title,'year'=>$shw]);
        History::where('id',2)->update(['content'=>$phn,'font'=>$titlear]);
        session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function addhist(Request $req){
  		$valarr=[
	       'year'=>'required|max:99999|integer',
	       'content'=>'required|min:5|max:300',
	       'contentar'=>'required|min:5|max:300',
	       'icon'=>'required'
	    ];
	    $this->validate($req,$valarr);
	    $year=$req->input('year');
	    $content=$req->input('content');
	    $contentar=$req->input('contentar');
	    $icon=$req->input('icon');
	    History::insert(['year'=>$year,'content'=>$content,'content_ar'=>$contentar,'font'=>$icon]);
	    session()->push('m','success');
	    session()->push('m','Date Added Successfully!');
  		return back();
  	}
  	public function edithist(Request $req,$id){
  		$valarr=[
	       'year'=>'required|max:99999|integer',
	       'content'=>'required|min:5|max:300',
	       'contentar'=>'required|min:5|max:300',
	       'icon'=>'required'
	    ];
	    $this->validate($req,$valarr);
	    $year=$req->input('year');
	    $content=$req->input('content');
	    $contentar=$req->input('contentar');
	    $icon=$req->input('icon');
	    History::where('id',$id)->update(['year'=>$year,'content'=>$content,'content_ar'=>$contentar,'font'=>$icon]);
	    session()->push('m','success');
	    session()->push('m','Date Updated Successfully!');
  		return back();
  	}
  	public function remhist($id){
  		History::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Date Removed Successfully!');
	    return back();
  	}
  	public function addclient(Request $req){
  		$valarr=[
	       'url'=>'required|min:5|max:100|url',
	       'img'=>'required|image|max:8192'
	    ];
	    $this->validate($req,$valarr);
	    $url=$req->input('url');
	    $img=$req->file('img');
	    $photoPath = public_path('/images/clients');
	   	Clients::insert(['url'=>$url]);
	   	$get=Clients::orderBy('id','desc')->first();
        $phn=$get->id;
   		$phn.='.'.$img->getClientOriginalExtension();
        $img->move($photoPath,$phn);
        Clients::where('id',$get->id)->update(['image'=>$phn]);
        session()->push('m','success');
	    session()->push('m','Client Added Successfully!');
  		return back();
  	}
  	public function editclient(Request $req,$id){
  		$valarr=[
	       'url'=>'required|min:5|max:100|url',
	       'img'=>'max:8192'
	    ];
	    $this->validate($req,$valarr);
	    $url=$req->input('url');
	    $img=$req->file('img');
	    $photoPath = public_path('/images/clients');
	   	$get=Clients::where('id',$id)->first();
        if(!empty($img)){
            $phn=$id;
       		$phn.='.'.$img->getClientOriginalExtension();
            $img->move($photoPath,$phn);
        }else{
            $phn=$get->image;
        }
        Clients::where('id',$get->id)->update(['url'=>$url,'image'=>$phn]);
        session()->push('m','success');
	    session()->push('m','Client Updated Successfully!');
  		return back();
  	}
  	public function remclient($id){
  		$get=Clients::where('id',$id)->first();
  		@unlink('images/clients/'.$get->image);
  		Clients::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Client Removed Successfully!');
	    return back();
  	}
  	public function addtist(Request $req){
  		$valarr=[
  		   'name'=>'required|max:60',
  		   'company'=>'required|max:60',
  		   'content'=>'required|max:400',
  		   'namept'=>'required|max:60',
  		   'companypt'=>'required|max:60',
  		   'contentpt'=>'required|max:400',
	       'img'=>'required|image|max:8192'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $comp=$req->input('company');
	    $cont=$req->input('content');
	    $namept=$req->input('namept');
	    $comppt=$req->input('companypt');
	    $contpt=$req->input('contentpt');
	    $img=$req->file('img');
	    $photoPath = public_path('/images/tistimonials');
	   	Tistimonials::insert(['name'=>$name,'company'=>$comp,'content'=>$cont,'name_PT'=>$namept,'company_PT'=>$comppt,'content_PT'=>$contpt]);
	   	$get=Tistimonials::orderBy('id','desc')->first();
        $phn=$get->id;
   		$phn.='.'.$img->getClientOriginalExtension();
        $img->move($photoPath,$phn);
        Tistimonials::where('id',$get->id)->update(['image'=>$phn]);
        session()->push('m','success');
	    session()->push('m','Tistimonial Added Successfully!');
  		return back();
  	}
  	public function edittist(Request $req,$id){
  		$valarr=[
  		   'name'=>'required|max:60',
  		   'company'=>'required|max:60',
  		   'content'=>'required|max:400',
  		   'namept'=>'required|max:60',
  		   'companypt'=>'required|max:60',
  		   'contentpt'=>'required|max:400',
	       'img'=>'max:8192'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $comp=$req->input('company');
	    $cont=$req->input('content');
	    $namept=$req->input('namept');
	    $comppt=$req->input('companypt');
	    $contpt=$req->input('contentpt');
	    $img=$req->file('img');
	    $photoPath = public_path('/images/tistimonials');
	   	$get=Tistimonials::where('id',$id)->first();
        if(!empty($img)){
            $phn=$id;
       		$phn.='.'.$img->getClientOriginalExtension();
            $img->move($photoPath,$phn);
        }else{
            $phn=$get->image;
        }
        Tistimonials::where('id',$get->id)->update(['name'=>$name,'company'=>$comp,'content'=>$cont,'name_PT'=>$namept,'company_PT'=>$comppt,'content_PT'=>$contpt,'image'=>$phn]);
        session()->push('m','success');
	    session()->push('m','Tistimonial Updated Successfully!');
  		return back();
  	}
  	public function remtist($id){
  		$get=Tistimonials::where('id',$id)->first();
  		@unlink('images/tistimonials/'.$get->image);
  		Tistimonials::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Tistimonial Removed Successfully!');
	    return back();
  	}
  	public function aboutmain(Request $req){
    	$valarr=[
	       'title'=>'required|min:10|max:300',
	       'titlept'=>'required|min:10|max:300',
	       'block1title'=>'required|min:5|max:100',
	       'block2title'=>'required|min:5|max:100',
	       'block3title'=>'required|min:5|max:100',
	       'block1content'=>'required|min:5|max:300',
	       'block2content'=>'required|min:5|max:300',
	       'block3content'=>'required|min:5|max:300',
	       'block1titlept'=>'required|min:5|max:100',
	       'block2titlept'=>'required|min:5|max:100',
	       'block3titlept'=>'required|min:5|max:100',
	       'block1contentpt'=>'required|min:5|max:300',
	       'block2contentpt'=>'required|min:5|max:300',
	       'block3contentpt'=>'required|min:5|max:300',
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $titlear=$req->input('titlept');
	    $show=$req->input('show');
	    $b1t=$req->input('block1title');
	    $b2t=$req->input('block2title');
	    $b3t=$req->input('block3title');
	    $b1c=$req->input('block1content');
	    $b2c=$req->input('block2content');
	    $b3c=$req->input('block3content');
	    $b1ta=$req->input('block1titlept');
	    $b2ta=$req->input('block2titlept');
	    $b3ta=$req->input('block3titlept');
	    $b1ca=$req->input('block1contentpt');
	    $b2ca=$req->input('block2contentpt');
	    $b3ca=$req->input('block3contentpt');
	    // $b1ic=$req->input('b1ic');
	    // $b2ic=$req->input('b2ic');
	    // $b3ic=$req->input('b3ic');
	    $shw='0';
	    if($show){
	    	$shw='1';
	    }
	    Aboutm::where('id',1)->update(['title'=>$title,'title_PT'=>$titlear,'icon'=>$shw]);
	    Aboutm::where('id',2)->update(['title'=>$b1t,'title_PT'=>$b1ta,'content'=>$b1c,'content_PT'=>$b1ca]);
	    Aboutm::where('id',3)->update(['title'=>$b2t,'title_PT'=>$b2ta,'content'=>$b2c,'content_PT'=>$b2ca]);
	    Aboutm::where('id',4)->update(['title'=>$b3t,'title_PT'=>$b3ta,'content'=>$b3c,'content_PT'=>$b3ca]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function contact(Request $req){
  		$content=$req->input('content');
  		$contentpt=$req->input('content_pt');
  		$map=$req->input('map');
  		Contact::where('id',1)->update(['content'=>$content,'content_PT'=>$contentpt,'map'=>$map]);
  		session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function addagent(Request $req){
  		$valarr=[
	       'name'=>'required|min:5|max:60',
	       'role'=>'required|min:2|max:60',
	       'desc'=>'required|min:5|max:100',
	       'namear'=>'required|min:5|max:60',
	       'rolear'=>'required|min:2|max:60',
	       'descar'=>'required|min:5|max:100',
	       'face'=>'max:100',
	       'twit'=>'max:100',
	       'goog'=>'max:100',
	       'in'=>'max:100',
	       'img'=>'required|max:2048|image'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $role=$req->input('role');
	    $desc=$req->input('desc');
	    $namear=$req->input('namear');
	    $rolear=$req->input('rolear');
	    $descar=$req->input('descar');
	    $face=$req->input('face');
	    $twit=$req->input('twit');
	    $goog=$req->input('goog');
	    $in=$req->input('in');
	    $img=$req->file('img');
	    Agents::insert(['name'=>$name,'role'=>$role,'description'=>$desc,'name_ar'=>$namear,'role_ar'=>$rolear,'description_ar'=>$descar,'face'=>$face,'twit'=>$twit,'google'=>$goog,'in'=>$in]);
	    $get=Agents::orderBy('id','desc')->first();
	    $photoName=$get->id;
        $photoName.='.'.$img->getClientOriginalExtension();
        $photoPath = public_path('/images/agents');
        $img->move($photoPath,$photoName);
        Agents::where('id',$get->id)->update(['image'=>$photoName]);
        session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
  	}
  	public function editagent(Request $req,$id){
  		$valarr=[
	       'name'=>'required|min:5|max:60',
	       'role'=>'required|min:2|max:60',
	       'desc'=>'required|min:5|max:100',
	       'namear'=>'required|min:5|max:60',
	       'rolear'=>'required|min:2|max:60',
	       'descar'=>'required|min:5|max:100',
	       'face'=>'max:100',
	       'twit'=>'max:100',
	       'goog'=>'max:100',
	       'in'=>'max:100',
	       'img'=>'max:2048|image'
	    ];
	    $this->validate($req,$valarr);
	    $name=$req->input('name');
	    $role=$req->input('role');
	    $desc=$req->input('desc');
	    $namear=$req->input('namear');
	    $rolear=$req->input('rolear');
	    $descar=$req->input('descar');
	    $face=$req->input('face');
	    $twit=$req->input('twit');
	    $goog=$req->input('goog');
	    $in=$req->input('in');
	    $img=$req->file('img');
	    $get=Agents::where('id',$id)->first();
	    $photoPath = public_path('/images/agents');
	    if(empty($get)){
	    	return redirect('/admin/agents');
	    }
	    if(!empty($img)){
            $photoName=$get->id;
       		$photoName.='.'.$img->getClientOriginalExtension();
            $img->move($photoPath,$photoName);
        }else{
            $photoName=$get->image;
        }
	    Agents::where('id',$id)->update(['name'=>$name,'role'=>$role,'description'=>$desc,'name_ar'=>$namear,'role_ar'=>$rolear,'description_ar'=>$descar,'face'=>$face,'twit'=>$twit,'google'=>$goog,'in'=>$in,'image'=>$photoName]);
        session()->push('m','success');
	    session()->push('m','Data Updated Successfully!');
  		return back();
  	}
  	public function remagent($id){
  		$get=Agents::where('id',$id)->first();
  		@unlink('images/agents/'.$get->image);
  		Agents::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Agent Removed Successfully!');
  		return back();
  	}

  	public function blogcat(Request $req){
    	$valarr=[
			'name'=>'required|min:3|max:80|unique:blog_category,name'
    	];
		$this->validate($req,$valarr);
	    Blogcat::insert(['name'=>$req->input('name')]);
	    return back();
    }
    public function editblogcat(Request $req,$id){
    	$valarr=[
			'name'=>'required|min:3|max:80|unique:blog_category,name'
    	];
		$this->validate($req,$valarr);
	    Blogcat::where('id',$id)->update(['name'=>$req->input('name')]);
	    return back();
    }
    public function removeblogcat($id){
    	$allblogs=Blogs::where('category',$id)->get();
    	foreach ($allblogs as $blog) {
    		$image=Blogs::where('id',$blog->id)->first();
	     	@unlink('images/blogs/'.$image->image);
	     	Blogcomm::where('blog',$blog->id)->delete();
	     	Blogs::where('id',$blog->id)->delete();
    	}
     	Blogcat::where('id',$id)->delete();
    	return back();
    }
    public function blog(Request $req){
    	$valarr=[
			'title'=>'required|min:3|max:80',
			'image'=>'required|image|max:8192',
			'sdesc'=>'required',
            'content'=>'required',
            'sdescpt'=>'required',
            'contentpt'=>'required',
            'titlept'=>'required|min:3|max:80',


    	];
    	$this->validate($req,$valarr);
    	$title=$req->input('title');
    	$sdesc=$req->input('sdesc');
        $content=$req->input('content');
        $titlept=$req->input('titlept');
    	$sdescpt=$req->input('sdescpt');
    	$contentpt=$req->input('contentpt');
    	// $cate=$req->input('cate');
    	$image =$req->file('image');
	    $photoPath = public_path('/images/blogs');
	    Blogs::insert(['title'=>$title,'sdesc'=>$sdesc,'content'=>$content,'title_PT'=>$titlept,'sdesc_PT'=>$sdescpt,'content_PT'=>$contentpt]);
	    $id=Blogs::orderBy('id', 'desc')->first();
	    $id=$id->id;
	    $photoName=$id;
        $photoName.='.'.$image->getClientOriginalExtension();
        $image->move($photoPath,$photoName);
        Blogs::where('id',$id)->update(['image'=>$photoName]);
        return back();
    }
    public function editblog(Request $req,$id){
    	$valarr=[
			'title'=>'required|min:3|max:80',
			'image'=>'image|max:8192',
			'sdesc'=>'required',
            'content'=>'required',
            'sdescpt'=>'required',
            'contentpt'=>'required',
            'titlept'=>'required|min:3|max:80',


    	];
    	$this->validate($req,$valarr);
    	$title=$req->input('title');
    	$sdesc=$req->input('sdesc');
        $content=$req->input('content');
        $titlept=$req->input('titlept');
    	$sdescpt=$req->input('sdescpt');
    	$contentpt=$req->input('contentpt');
    	// $cate=$req->input('cate');
    	$image =$req->file('image');
	    $photoPath = public_path('/images/blogs');
	    if(!empty($image)){
            $photoName=$id;
            $photoName.='.'.$image->getClientOriginalExtension();
            $image->move($photoPath,$photoName);
        }else{
        	$blog=Blogs::where('id',$id)->first();
            $photoName=$blog->image;
        }
        Blogs::where('id',$id)->update(['title'=>$title,'image'=>$photoName,'sdesc'=>$sdesc,'content'=>$content,
        'title_PT'=>$titlept,'sdesc_PT'=>$sdescpt,'content_PT'=>$contentpt]);
        return back();
    }
    public function removeblog($id){
    	$image=Blogs::where('id',$id)->first();
     	@unlink('images/blogs'.$image->image);
     	Blogcomm::where('blog',$id)->delete();
     	Blogs::where('id',$id)->delete();
    	return back();
    }
    public function upload(Request $req){
    	$valarr=[
			'img'=>'required|image|max:8192'
    	];
    	$this->validate($req,$valarr);
    	$image =$req->file('img');
	    $photoPath = public_path('/images/upload');
    	$photoName=str_random(32);
        $photoName.='.'.$image->getClientOriginalExtension();
        $image->move($photoPath,$photoName);
        return view('/admin/upload')->withUrl(asset('/images/upload').'/'.$photoName);
    }
    public function comments($id){
    	$comment=Blogcomm::where('id',$id)->first();
    	if(!empty($comment)){
    		if($comment->approve==0){
    			Blogcomm::where('id',$id)->update(['approve'=>1]);
    		}else{
    			Blogcomm::where('id',$id)->update(['approve'=>0]);
    		}
    	}
    	return back();
    }
    public function response(Request $req){
    	$valarr=[
	       'title'=>'required|min:10|max:60',
	       'content'=>'required',
	       'titlear'=>'required|min:10|max:60',
	       'contentar'=>'required',
	       'img'=>'max:4096'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $titlear=$req->input('titlear');
	    $show=$req->input('show');
	    $content=$req->input('content');
	    $contentar=$req->input('contentar');
	    $shw='0';
	    if($show){
	    	$shw='1';
	    }
	    $image =$req->file('img');
	    $photoPath = public_path('/images/response');
	    if(!empty($image)){
            $photoName='response';
            $photoName.='.'.$image->getClientOriginalExtension();
            $image->move($photoPath,$photoName);
        }else{
        	$resp=Response::where('id',1)->first();
            $photoName=$resp->image;
        }
	    Response::where('id',1)->update(['title'=>$title,'title_ar'=>$titlear,'show'=>$shw,'image'=>$photoName,'content'=>$content,'content_ar'=>$contentar]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
    }
    public function media(Request $req){
    	$valarr=[
	       'title'=>'required|min:5|max:60',
	       'content'=>'required',
	       'titlear'=>'required|min:5|max:60',
	       'contentar'=>'required',
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $content=$req->input('content');
	    $titlear=$req->input('titlear');
	    $contentar=$req->input('contentar');
	    Media::where('id',1)->update(['title'=>$title,'link'=>$content]);
	    Media::where('id',2)->update(['title'=>$titlear,'link'=>$contentar]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
    }
    public function addmed(Request $req){
    	$valarr=[
	       'title'=>'required|min:5|max:60',
	       'link'=>'required'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $link=$req->input('link');
	    Media::insert(['title'=>$title,'link'=>$link]);
	    session()->push('m','success');
	    session()->push('m','Media Saved Successfully!');
  		return back();
    }
    public function editmed(Request $req,$id){
    	$valarr=[
	       'title'=>'required|min:5|max:60',
	       'link'=>'required'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $link=$req->input('link');
	    Media::where('id',$id)->update(['title'=>$title,'link'=>$link]);
	    session()->push('m','success');
	    session()->push('m','Media Updated Successfully!');
  		return back();
    }
    public function remmed($id){
    	Media::where('id',$id)->delete();
    	session()->push('m','success');
	    session()->push('m','Media Removed Successfully!');
  		return back();
    }
    public function health(Request $req){
    	$valarr=[
	       'content'=>'required',
	       'contentar'=>'required',
	    ];
	    $this->validate($req,$valarr);
	    $content=$req->input('content');
	    $contentar=$req->input('contentar');
	    $image =$req->file('img');
	    $photoPath = public_path('/images/health');
	    if(!empty($image)){
            $photoName='hel';
            $photoName.='.'.$image->getClientOriginalExtension();
            $image->move($photoPath,$photoName);
        }else{
        	$resp=Health::where('id',1)->first();
            $photoName=$resp->image;
        }
	    Health::where('id',1)->update(['content'=>$content,'content_ar'=>$contentar,'image'=>$photoName]);
	    session()->push('m','success');
	    session()->push('m','Data Saved Successfully!');
  		return back();
    }
    public function addpro(Request $req){
    	$valarr=[
	       'title'=>'required|min:4|max:60',
	       'content'=>'required|min:4|max:500',
	       'address'=>'required|min:4|max:100',
	       'titlear'=>'required|min:4|max:60',
	       'contentar'=>'required|min:4|max:500',
	       'addressar'=>'required|min:4|max:100',
	       'e1'=>'required|min:4|max:30',
	       'e1d'=>'required|min:4|max:150',
	       'e2'=>'required|min:4|max:30',
	       'e2d'=>'required|min:4|max:150',
	       'e3'=>'required|min:4|max:30',
	       'e3d'=>'required|min:4|max:150',
	       'e4'=>'required|min:4|max:30',
	       'e4d'=>'required|min:4|max:150',
	       'e1ar'=>'required|min:4|max:30',
	       'e1dar'=>'required|min:4|max:150',
	       'e2ar'=>'required|min:4|max:30',
	       'e2dar'=>'required|min:4|max:150',
	       'e3ar'=>'required|min:4|max:30',
	       'e3dar'=>'required|min:4|max:150',
	       'e4ar'=>'required|min:4|max:30',
	       'e4dar'=>'required|min:4|max:150',
	       'img'=>'required|image|max:4096',
	       'time'=>'required|min:6|max:60',
	       'timear'=>'required|min:6|max:60',
	       'price'=>'required|numeric'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $address=$req->input('address');
	    $content=$req->input('content');
	    $titlear=$req->input('titlear');
	    $addressar=$req->input('addressar');
	    $contentar=$req->input('contentar');
	    $e1=$req->input('e1');
	    $e1d=$req->input('e1d');
	    $e2=$req->input('e2');
	    $e2d=$req->input('e2d');
	    $e3=$req->input('e3');
	    $e3d=$req->input('e3d');
	    $e4=$req->input('e4');
	    $e4d=$req->input('e4d');
	    $e1ar=$req->input('e1ar');
	    $e1dar=$req->input('e1dar');
	    $e2ar=$req->input('e2ar');
	    $e2dar=$req->input('e2dar');
	    $e3ar=$req->input('e3ar');
	    $e3dar=$req->input('e3dar');
	    $e4ar=$req->input('e4ar');
	    $e4dar=$req->input('e4dar');
	    $time=$req->input('time');
	    $timear=$req->input('timear');
	    $price=$req->input('price');
	    $image =$req->file('img');
	    $photoPath = public_path('/images/projects');
	    Projects::insert(['title'=>$title,'content'=>$content,'address'=>$address,'title_ar'=>$titlear,'content_ar'=>$contentar,'address_ar'=>$addressar,'el1'=>$e1,'el1con'=>$e1d,'el2'=>$e2,'el2con'=>$e2d,'el3'=>$e3,'el3con'=>$e3d,'el4'=>$e4,'el4con'=>$e4d,'el1ar'=>$e1ar,'el1conar'=>$e1dar,'el2ar'=>$e2ar,'el2conar'=>$e2dar,'el3ar'=>$e3ar,'el3conar'=>$e3dar,'el4ar'=>$e4ar,'el4conar'=>$e4dar,'time'=>$time,'time_ar'=>$timear,'price'=>$price]);
	    $get=Projects::orderBy('id','desc')->first();
	    $photoName=$get->id;
        $photoName.='.'.$image->getClientOriginalExtension();
        $image->move($photoPath,$photoName);
        Projects::where('id',$get->id)->update(['image'=>$photoName]);
        session()->push('m','success');
	    session()->push('m','Project Added Successfully!');
  		return back();
    }
    public function editpro(Request $req,$id){
    	$valarr=[
	       'title'=>'required|min:4|max:60',
	       'content'=>'required|min:4|max:500',
	       'address'=>'required|min:4|max:100',
	       'titlear'=>'required|min:4|max:60',
	       'contentar'=>'required|min:4|max:500',
	       'addressar'=>'required|min:4|max:100',
	       'e1'=>'required|min:4|max:30',
	       'e1d'=>'required|min:4|max:150',
	       'e2'=>'required|min:4|max:30',
	       'e2d'=>'required|min:4|max:150',
	       'e3'=>'required|min:4|max:30',
	       'e3d'=>'required|min:4|max:150',
	       'e4'=>'required|min:4|max:30',
	       'e4d'=>'required|min:4|max:150',
	       'e1ar'=>'required|min:4|max:30',
	       'e1dar'=>'required|min:4|max:150',
	       'e2ar'=>'required|min:4|max:30',
	       'e2dar'=>'required|min:4|max:150',
	       'e3ar'=>'required|min:4|max:30',
	       'e3dar'=>'required|min:4|max:150',
	       'e4ar'=>'required|min:4|max:30',
	       'e4dar'=>'required|min:4|max:150',
	       'img'=>'max:4096',
	       'time'=>'required|min:6|max:60',
	       'timear'=>'required|min:6|max:60',
	       'price'=>'required|numeric'
	    ];
	    $this->validate($req,$valarr);
	    $title=$req->input('title');
	    $address=$req->input('address');
	    $content=$req->input('content');
	    $titlear=$req->input('titlear');
	    $addressar=$req->input('addressar');
	    $contentar=$req->input('contentar');
	    $e1=$req->input('e1');
	    $e1d=$req->input('e1d');
	    $e2=$req->input('e2');
	    $e2d=$req->input('e2d');
	    $e3=$req->input('e3');
	    $e3d=$req->input('e3d');
	    $e4=$req->input('e4');
	    $e4d=$req->input('e4d');
	    $e1ar=$req->input('e1ar');
	    $e1dar=$req->input('e1dar');
	    $e2ar=$req->input('e2ar');
	    $e2dar=$req->input('e2dar');
	    $e3ar=$req->input('e3ar');
	    $e3dar=$req->input('e3dar');
	    $e4ar=$req->input('e4ar');
	    $e4dar=$req->input('e4dar');
	    $time=$req->input('time');
	    $timear=$req->input('timear');
	    $price=$req->input('price');
	    $image =$req->file('img');
	    $photoPath = public_path('/images/projects');
	    $get=Projects::where('id',$id)->first();
	    if(!empty($image)){
            $photoName=$id;
            $photoName.='.'.$image->getClientOriginalExtension();
            $image->move($photoPath,$photoName);
        }else{
            $photoName=$get->image;
        }
        Projects::where('id',$id)->update(['image'=>$photoName,'title'=>$title,'content'=>$content,'address'=>$address,'title_ar'=>$titlear,'content_ar'=>$contentar,'address_ar'=>$addressar,'el1'=>$e1,'el1con'=>$e1d,'el2'=>$e2,'el2con'=>$e2d,'el3'=>$e3,'el3con'=>$e3d,'el4'=>$e4,'el4con'=>$e4d,'el1ar'=>$e1ar,'el1conar'=>$e1dar,'el2ar'=>$e2ar,'el2conar'=>$e2dar,'el3ar'=>$e3ar,'el3conar'=>$e3dar,'el4ar'=>$e4ar,'el4conar'=>$e4dar,'time'=>$time,'time_ar'=>$timear,'price'=>$price]);
        session()->push('m','success');
	    session()->push('m','Project Updated Successfully!');
  		return back();
    }
    public function rempro($id){
  		$get=Projects::where('id',$id)->first();
  		@unlink('images/projects/'.$get->image);
  		Projects::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Project Removed Successfully!');
  		return back();
  	}
  	public function Faqnew(Request $req){
  		$valarr=[
	       'qus'=>'required|min:4|max:200',
	       'answer'=>'required',
	       'quspt'=>'required|min:4|max:200',
	       'answerpt'=>'required',

	    ];
	    $this->validate($req,$valarr);
	    $qus=$req->input('qus');
	    $quspt=$req->input('quspt');
	    $answer=$req->input('answer');
	    $answerpt=$req->input('answerpt');
	    Faq::insert(['qus'=>$qus,'qus_PT'=>$quspt,'answer'=>$answer,'answer_PT'=>$answerpt]);
	    session()->push('m','success');
	    session()->push('m','Faq Added Successfully!');
  		return back();
  	}
  	public function Faqedit(Request $req,$id){
        $valarr=[
            'qus'=>'required|min:4|max:200',
            'answer'=>'required',
            'quspt'=>'required|min:4|max:200',
            'answerpt'=>'required',

         ];
	    $this->validate($req,$valarr);
        $qus=$req->input('qus');
	    $quspt=$req->input('quspt');
	    $answer=$req->input('answer');
	    $answerpt=$req->input('answerpt');
	    Faq::where('id',$id)->update(['qus'=>$qus,'qus_PT'=>$quspt,'answer'=>$answer,'answer_PT'=>$answerpt]);
	    session()->push('m','success');
	    session()->push('m','Faq Updated Successfully!');
  		return back();
  	}
  	public function remFaq($id){

  		Faq::where('id',$id)->delete();
  		session()->push('m','success');
	    session()->push('m','Faq Removed Successfully!');
  		return back();
  	}
  	public function admin(Request $req){
  		$valarr=[
	       'email'=>'required|min:4|max:60|email',
	       'pass'=>'required|min:8|max:30|confirmed',
	    ];
	    $this->validate($req,$valarr);
	    $email=$req->input('email');
	    $pass=Hash::make($req->input('pass'));
	    Users::where('id',1)->update(['email'=>$email,'password'=>$pass]);
	    session()->push('m','success');
	    session()->push('m','Data Updated Successfully!');
  		return back();
  	}
}
