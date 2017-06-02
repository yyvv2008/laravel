<?php 

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
use App\Events\Event;

/**
* 
*/
class NodeController extends Controller
{
	public function test()
	{
		// return 'test for';
		$nodes = DB::select('select * from byt_klha_node');
		dd($nodes);
		return Node::first();
	}

	public function query1()
	{
		$id = DB::table('byt_klha_node')->insertGetId([
				'gateway_id' => 1,
				'name' => 'test4',
				'land_id' => 24,
				'sensor_addr' => 10,
			]);

		var_dump($id);
	}

	public function query2()
	{
		// $res = DB::table('byt_klha_node')
		// 	->where(['id' => 8])
		// 	->update([
		// 		'name' => 'wyang',
		// 		'land_id' => 24
		// 	]);

		// $res = DB::table('byt_klha_node')
		// 	->where(['id' => 13])
		// 	->increment('land_id', 1, ['name' => 'wyang']);

		dd($res);
	}

	public function query3()
	{
		$res = DB::table('byt_klha_node')
			->where(['name' => 'wyang'])
			->where('id', '>=', 13)
			->delete();

		// delete table
		// DB::table('byt_klha_node')->truncate();
		var_dump($res);
	}

	public function query4()
	{
		$res = DB::table('byt_klha_node')->get();

		$res = DB::table('byt_klha_node')
			->whereRaw('id >= ? and land_id = ?', [7, 24])
			// ->orderByDesc('id')
			// ->pluck('land_id', 'name');
			// ->select('id', 'name', 'land_id')
			// ->get();
			->count('id');

		// DB::table('byt_klha_node')
		// 	->orderBy('id')
		// 	->chunk(2, function($nodes) {
		// 		var_dump($nodes);
		// 	});

		// foreach ($res as $r) {
		// 	var_dump($r->land_id);
		// }

		dd($res);
	}

	public function orm1()
	{
		$res = Node::all();
		$res = Node::findOrFail([8, 9]);
		$res = Node::get();
		$res = Node::count();
		$res = Node::whereRaw('id >= ? and land_id = ?', [7, 24])
			->orderByDesc('id')
			->first();

		// Node::chunk(3, function($nodes) {
		// 	var_dump($nodes);
		// });


		dd($res);
	}

	public function orm2()
	{
		// $model = new Node();
		// $model->id = 13;
		// $model->name = 'orm1';
		// $model->gateway_id = 1;
		// $model->land_id = 26;

		// $res = $model->save();

		// $res = Node::find(13);

		// $res = Node::create([
		// 		'name' => 'orm2',
		// 		'gateway_id' => 1,
		// 		'land_id' => 22,
		// 	]);

		$res = Node::find(16)->attributesToArray();

		// find or insert a new data
		// $res = Node::firstOrCreate([
		// 		'name' => 'orm4',
		// 		'gateway_id' => 1,
		// 		'land_id' => 22,
		// 	]);

		// find or new nees save data
		$res = Node::firstOrNew([
				'name' => 'orm5',
				'gateway_id' => 1,
				'land_id' => 22,
			])->save();

		dd($res); 
	}

	public function orm3()
	{
		// $res = Node::orderByDesc('id')
		// 	->first();

		// $res->name = 'update';
		// $res = $res->save();


		$res = Node::whereRaw('id >= ? and name = ?', [13, 'orm2'])->update([
				'name' => 'ups',
				'land_id' => 23,
			]);

		dd($res);
	}

	public function orm4()
	{
		// $res = Node::find(18)->delete();
		// $res = Node::destroy([18, 20]);
		$res = Node::where('id', '>=', 16)->delete();

		dd($res);
	}

	public function section1()
	{
		$node = Node::first();
		return view('nodes.section1', ['node' => $node]);
	}

	public function urlTest()
	{
		return 'urlTest';
	}

	public function request1(Request $request)
	{
		// echo $request->input('name');
		// echo $request->input('age', 'default');

		// if ($request->has('age')) {
		// 	echo $request->input('age');
		// } else {
		// 	echo 'no arguments';
		// }

		// dd($request->all());

		// echo $request->method();

		// echo $request->isMethod('get');

		// var_dump($request->ajax());
		
		$res = $request->is('node/*');

		$res = $request->url();

		$res = Route::current();
		$res = Route::currentRouteName();
		$res = Route::currentRouteAction();

		dd($res);
	}

	public function session1(Request $request)
	{
		// $request->session()->put('key1', 'value1');
		// session()->put('key2', 'value2');
		// Session::put('key3', 'value3');
		// return $request->session()->get('key2');
		// return Session::get('key3', 'default');

		// Session::push('node', 'wang');
		// Session::push('node', 'yang');

		// return Session::pull('node', 'defautl');
		// 
		// get all;
		// return dd(Session::all());
		// 
		// if (Session::has('key1')) {
		// 	return 'key1 is exists';
		// } else {
		// 	return 'key1 is not exists';
		// }
		// Session::forget('key1');
		// 
		// delete all;
		// Session::flush();
		
		// Session::flash('key-f', 'value-f');
		// dd(Session::all(), Session::get('key-f'));
	}

	public function session2(Request $request)
	{
		// Session::flush();
		return dd(Session::all());
		// return dd(Session::get('message', 'default'));
	}

	public function response()
	{
		$data = [
			'name' => 'wyang',
			'age' => 18,
		];

		// return response()->json($data);
		// return redirect('node/session2')->with('message', 'this is a message');
		// return redirect()->action('NodeController@session2')->with('mes', 'this is a message');

		// return redirect()->route('session2');
		return redirect()->back();
	}

	public function active0()
	{
		return 'starting';
	}

	public function active1()
	{
		return 'ending';
	}





	public function index()
	{
		// $columns = Schema::getColumnListing('users');
		// dd($columns);

		// $nodes = DB::table('byt_klha_node')->get();
		$nodes = Node::paginate(3);

		// dd($nodes);
		return view('node.index', ['nodes' => $nodes]);
	}

	public function create(Request $request)
	{
		$node = new Node();
		if ($request->isMethod('post')) {


			$this->validate($request, [
				'Node.gateway_id' => 'required|integer',
				'Node.name' => 'required|min:2|max:6',
				'Node.land_id' => 'required|integer',
				'Node.sensor_addr' => 'required|integer',
			], [
				'required' => ':attribute 为必填项',
				'min' => ':attribute 不能少于2个字符',
				'integer' => ':attribute 为整数',
			], [
				'Node.gateway_id' => '网关ID',
				'Node.name' => '名称',
				'Node.land_id' => '地块ID',
				'Node.sensor_addr' => '传感器类型',
			]);

			// $validate = \Validator::make($request->input(), [
			// 	'Node.gateway_id' => 'required|integer',
			// 	'Node.name' => 'required|min:2|max:6',
			// 	'Node.land_id' => 'required|integer',
			// 	'Node.sensor_addr' => 'required|integer',
			// ], [
			// 	'required' => ':attribute 为必填项',
			// 	'min' => ':attribute 不能少于2个字符',
			// 	'integer' => ':attribute 为整数',
			// ], [
			// 	'Node.gateway_id' => '网关ID',
			// 	'Node.name' => '名称',
			// 	'Node.land_id' => '地块ID',
			// 	'Node.sensor_addr' => '传感器类型',
			// ]);

			// if ($validate->fails()) {
			// 	return redirect()->back()->withErrors($validate)->withInput();
			// }

			$datas = $request->input('Node');

			if ($res = Node::create($datas)) {
				echo $res->name;
				// return redirect('node/index')->with('success', 'yeah, it is done!!!');
			} else {
				return redirect()->with('error', 'oh, no!!!')->back();
			}
		}

		return view('node.create', [
				'node' => $node,
			]);
	}

	// public function save(Request $request)
	// {
	// 	$datas = $request->input('Node');

	// 	$node = new Node;
	// 	$node->gateway_id = $datas['gateway_id'];
	// 	$node->name = $datas['name'];
	// 	$node->land_id = $datas['land_id'];
	// 	$node->sensor_addr = $datas['sensor_addr'];
	// 	if ($node->save()) {
	// 		return redirect('node/index');
	// 	} else {
	// 		return redirect()->back();
	// 	}

	// 	dd($datas);
	// }

	public function update(Request $request, $id)
	{
		$node = Node::find($id);

		if ($request->isMethod('post')) {

			$this->validate($request, [
				'Node.gateway_id' => 'required|integer',
				'Node.name' => 'required|min:2|max:6',
				'Node.land_id' => 'required|integer',
				'Node.sensor_addr' => 'required|integer',
			], [
				'required' => ':attribute 为必填项',
				'min' => ':attribute 不能少于2个字符',
				'integer' => ':attribute 为整数',
			], [
				'Node.gateway_id' => '网关ID',
				'Node.name' => '名称',
				'Node.land_id' => '地块ID',
				'Node.sensor_addr' => '传感器类型',
			]);

			$datas = $request->input('Node');

			if (Node::where('id', $id)->update($datas)) {
				return redirect('node/index')->with('success', 'success for ' . $id);
			} else {
				return redirect()->with('error', 'oh, no!!!')->back();
			}
		}

		return view('node.update', [
				'node' => $node
			]);
	}

	public function view($id)
	{
		$node = Node::find($id)->attributesToArray();

		return view('node.view', [
				'node' => $node
			]);
	}

	public function delete($id)
	{
		$res = Node::find($id)->delete();

		if ($res) {
			return redirect('node/index')->with('success', 'yes delete ' . $id);
		} else {
			return redirect('node/index')->with('error', 'fail delete ' . $id);
		}
	}

	public function redis()
	{
		// $res = Redis::lpush('names', 'Taylor3');
		// $res = Redis::lpush('names', 'Taylor4');

		// $res = Redis::flushdb();
		// $res = Redis::lrange('names', 0, -1);
		// $result = Redis::lrange('names', 0, 0);

		Redis::set('name1', 'val1');
		Redis::set('name2', 'val2');

		$res = Redis::mget(['name1', 'name2']);


		dd($res);
	}

	public function foreignKey()
	{
		// $res = Node::first()->gateway->name;
		$res = Node::first();

		event(new Event($res));


		// dd($res);

		// Log::info(' the testing log');
		// Log::error('User failed to login.', ['id' => 1]);
		// $monolog = Log::getMonolog();


	}
}