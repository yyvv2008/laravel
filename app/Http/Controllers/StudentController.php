<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Jobs\SendEmail;

class StudentController extends Controller
{
    //

    public function upload(Request $request)
    {
    	if ($request->isMethod('POST')) {
    		$file = $request->file('source');

    		if ($file->isValid()) {
    			// $originalName = $file->getClientOriginalName();
    			// $ext = $file->getClientOriginalExtension();
    			// $ext = $file->guessExtension();
    			// $type = $file->getClientMimeType();

    			// $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

    			$res = $file->storeAs('', 'testa' . '.' . $file->guessExtension(), 'uploads');

    			dd($res);
    		}

    	}

    	return view('student.upload');
    }

    public function mail()
    {
    	// Mail::raw('mail content', function($message) {
    	// 	$message->from('yyvv2008@163.com', 'mukewang');
    	// 	$message->subject('mail test');
    	// 	$message->to('591012658@qq.com');
    	// });

    	Mail::send('student.mail', ['name' => 'wyang'], function($message) {
    		$message->from('yyvv2008@163.com', 'xp');
    		$message->subject('mail test');
    		$message->to('591012658@qq.com');
    	});
    }

    public function cache1()
    {
    	// Cache::put('key1', 'value1', 1);
    	// $bool = Cache::add('key2', 'value2', 10);

    	// Cache::forever('key3', 'value3');

    	if (Cache::has('key1')) {
    		var_dump(Cache::get('key1'));
    	} else {
    		echo 'no key1';
    	}

    	// var_dump($bool);
    }

    public function cache2()
    {
    	// $val = Cache::get('key3');

    	// $val = Cache::pull('key2');

    	// $val = Cache::forget('key3');
    	// var_dump($val);
    }

    public function error()
    {
    	// $name = 'wyang';
    	// var_dump($name);

    	// $res = null;
    	// if ($res == null) {
    	// 	abort('503');
    	// }

    	Log::info('this is a info log');
    	Log::Warning('this is a warning log');
    	Log::error('this is a array', ['name' => 'wyang', 'age' => 18]);
    }

    public function queue()
    {
    	// $res = dispatch(new SendEmail('5910126585555@qq.com'));

    	// $job = new SendEmail('591012658@qq.com');
    	// $job->handle();

    	// var_dump($res);
    }
}
