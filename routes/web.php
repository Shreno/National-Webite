<?php

/*
This File Create By Eng.Ahmed Magdy "27/2/2019 - 8:12 PM"
This File send routes to router controller to make process then return View
© 2019 By Touch-Corp (Bridges)
*/


 Route::get('/','router@index');
//rOUTE::GET('/','adminrouter@index');
Route::get('/home','router@index');
Route::get('/about','router@about');
Route::get('/health','router@health');
Route::get('/projects','router@projects');
Route::get('/project/{id}','router@project');
Route::get('/media','router@media');
Route::get('/services','router@services');
Route::get('/blogs','router@blogs');
Route::get('/blog/{id}','router@blog');
Route::post('/comment/{id}','process@comm');
Route::get('/contact','router@contact');
Route::post('/sendmessage','process@send');
Route::post('/news','process@news');
Route::get('/ar','process@ar');
Route::get('/en','process@en');

Route::get('/out','Auth\LoginController@logout');

Route::get('/admin','adminrouter@index');
Route::get('/admin/header','adminrouter@header');
Route::post('/admin/header','adminprocess@header');
Route::get('/admin/main','adminrouter@main');
Route::post('/admin/main','adminprocess@main');
Route::get('/admin/profile','adminrouter@profile');
Route::post('/admin/profile','adminprocess@profile');
Route::get('/admin/team','adminrouter@team');
Route::post('/admin/addteam','adminprocess@addteam');
Route::post('/admin/editteam/{id}','adminprocess@editteam');
Route::get('/admin/remteam/{id}','adminprocess@remteam');
Route::get('/admin/stat','adminrouter@stat');
Route::post('/admin/addstat','adminprocess@addstat');
Route::post('/admin/editstat/{id}','adminprocess@editstat');
Route::get('/admin/history','adminrouter@history');
Route::post('/admin/historydata','adminprocess@histdata');
Route::post('/admin/addhistory','adminprocess@addhist');
Route::post('/admin/edithist/{id}','adminprocess@edithist');
Route::get('/admin/remhist/{id}','adminprocess@remhist');
Route::get('/admin/mission','adminrouter@mission');
Route::post('/admin/mission','adminprocess@mission');
Route::get('/admin/clients','adminrouter@clients');
Route::get('/admin/Testimonials','adminrouter@Testimonials');


Route::post('/admin/addclient','adminprocess@addclient');
Route::post('/admin/editclient/{id}','adminprocess@editclient');
Route::get('/admin/remclient/{id}','adminprocess@remclient');
Route::post('/admin/addtist','adminprocess@addtist');
Route::post('/admin/edittist/{id}','adminprocess@edittist');
Route::get('/admin/remtist/{id}','adminprocess@remtist');

Route::get('/admin/aboutmain','adminrouter@aboutmain');
Route::post('/admin/aboutmain','adminprocess@aboutmain');
//
Route::get('/admin/Faq','adminrouter@Faq');
Route::post('/admin/wedocont','adminprocess@wedocont');
Route::post('/admin/Faqnew','adminprocess@Faqnew');
Route::post('/admin/Faqedit/{id}','adminprocess@Faqedit');
Route::post('/admin/remFaq','adminprocess@remFaq');




Route::get('/admin/agents','adminrouter@agents');
Route::post('/admin/addagent','adminprocess@addagent');
Route::post('/admin/editagent/{id}','adminprocess@editagent');
Route::get('/admin/remagent/{id}','adminprocess@remagent');
Route::get('/admin/response','adminrouter@response');
Route::post('/admin/response','adminprocess@response');

Route::get('/admin/contact','adminrouter@contact');
Route::post('/admin/contact','adminprocess@contact');
Route::get('/admin/messages','adminrouter@messages');
Route::get('/admin/news','adminrouter@news');
Route::get('/admin/blogs','adminrouter@blogs');
Route::post('/admin/blogcat','adminprocess@blogcat');
Route::post('/admin/blogcat/{id}','adminprocess@editblogcat');
Route::post('/admin/blog','adminprocess@blog');
Route::get('/upload/editor','adminrouter@upload');
Route::post('/upload/editor','adminprocess@upload');
Route::post('/admin/blog/{id}','adminprocess@editblog');
Route::get('/admin/blog/remove/{id}','adminprocess@removeblog');
Route::get('/admin/comments','adminrouter@comments');
Route::get('/admin/comments/{id}','adminprocess@comments');

Route::get('/admin/media','adminrouter@media');
Route::post('/admin/media','adminprocess@media');
Route::post('/admin/addmed','adminprocess@addmed');
Route::post('/admin/editmed/{od}','adminprocess@editmed');
Route::get('/admin/remmed','adminprocess@remmed');
Route::get('/admin/health','adminrouter@health');
Route::post('/admin/health','adminprocess@health');

Route::get('/admin/projects','adminrouter@projects');
Route::post('/admin/addpro','adminprocess@addpro');
Route::post('/admin/editpro/{id}','adminprocess@editpro');
Route::get('/admin/rempro/{id}','adminprocess@rempro');

Route::get('/admin/admin','adminrouter@admin');
Route::post('/admin/admin','adminprocess@admin');

Auth::routes();
