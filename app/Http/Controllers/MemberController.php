<?php 

namespace App\Http\Controllers;

use App\Member;

/**
* 
*/
class MemberController extends Controller
{
	public function info()
	{

		return Member::getMember();

		// return 'mem-info-id-' . $id;
		// return route('mem-info');

		// return view('member/info', [
		// 		'username' => 'admin',
		// 		'age' => 18,
		// 	]);
	}


}