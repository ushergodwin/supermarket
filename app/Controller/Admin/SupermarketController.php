<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Supermarket;
use App\Models\SupermarketVisitor;
use App\Models\User;
use System\Database\DB;
use \System\Http\Request\Request; 

 class SupermarketController extends BaseController 
 { 

		public function __construct()
		{
			if(!$this->session()->contains('user'))
			{
				return redirect();
			}
			
		}
 		/**
		* Display a listing of the resource.
		* @return \System\Http\Response\Response
		*/
		public function index()
		{
			//
			$columns = "supermarkets.id, supermarkets.name, supermarkets.created_at,
			supermarkets.expires, users.id as user_id, users.fname, users.lname, supermarkets.expired, db_name";
			$context = [
				'title' => 'DASHBOARD | Supermarkets',
				'collection' => Supermarket::with(User::class)->get($columns)
			];
	
			return render('admin.super.supermarkets', $context);
 		}

		/**
		* Show the form for creating a new resource.
		* @return \System\Http\Response\Response
		*/
		public function create()
		{
			// 
			$context = [
				'title' => 'DASHBOARD | Supermarkets',
				'users' => User::all()
			];
			return render('admin.super.add_supermarket', $context);
 		}

		/**
		* Store a newly created resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function store(Request $request)
		{
			$request->validate([
				'name' => 'required',
				'owner' => 'required',
				'expiry_date' => 'required|date'
			]);
			$sup_name = $request->post('name');
			$sup_name = strtolower($sup_name);
			$sup_name = str_replace(" ", "_", $sup_name);
			$sup_name = "supermarket_" . $sup_name;
			$supermarket = new Supermarket();
			$supermarket->name = $request->post('name');
			$supermarket->db_name = $sup_name;
			$supermarket->user_id = $request->post('owner');
			$supermarket->expires = $request->post('expiry_date');
			$supermarket->expired = 0;
			$supermarket->fee = $request->post('fee');

			if(!$supermarket->save())
			{
				return redirect()->back()->withInput()->with('failed', 'Failed to add supermarket');
			}
	
			DB::exec("CREATE DATABASE IF NOT EXISTS $sup_name");
			DB::import(["supermarket_items.sql", "searched_items.sql"], $sup_name);
			User::where('id', $request->post('owner'))->update(['account' => 'admin', 'has_supermarket' => $supermarket->lastId()]);

			return redirect()->back()->with('success', $request->post('name') . " supermarket created successfully");
 		}

		/**
		* Display the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function show($id)
		{

 		}

		/**
		* Show the form for editing the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function edit($id)
		{
			
			$supermarket = Supermarket::find($id)->value('db_name');

			$columns = "supermarkets.id, supermarkets.user_id as owner, supermarkets.name, supermarkets.created_at,supermarkets.expires, users.fname, users.lname, supermarkets.expired, db_name, fee";
			$supermarketDetails = Supermarket::with(User::class)->where('supermarkets.id', $id)->get($columns);

			$context = [
				'title' => "DASHBOARD | SUPERMARKET | " . strtoupper(str_replace('_', ' ', $supermarket)),
				'collection' => $supermarketDetails[0],
				'users' => User::all(),
				'supermarket' => strtoupper(str_replace('_', ' ', $supermarket))
			];

			return render('admin/super/edit_supermarket', $context);

 		}

		/**
		* Update the specified resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function update(Request $request)
		{
			$name = $request->post('name');
			$owner = $request->post('owner');
			$exipry_date = $request->post('expiry_date');
			$is_expired = $request->post('is_expired');
			$fee = $request->post('fee', 10000);

			$id = $request->post('id');

			$update = [
				'name' => $name,
				'user_id' => $owner,
				'expires' => $exipry_date,
				'expired' => $is_expired,
				'fee' => $fee
			];

			if(!Supermarket::find($id)->update($update))
			{
				return response()->send(202, alert()->danger("Oops, changes not saved! Please try again later."));
			}
			return response()->send(202, alert()->success("Changes saved successfully."));

 		}

		/**
		* Remove the specified resource from storage.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function destroy(Request $request)
		{
			// 
			$id = $request->post('resource_id');
			$user = $request->post('user_id');

			$sup = Supermarket::find($id)->value('db_name');

			$delete = Supermarket::find($id)->delete();
			if(!$delete)
			{
				return response()->json(202, "Supermarket not deleted.");
			}

			DB::exec("DROP DATABASE `$sup`");

			User::find($user)->update(['has_supermarket' => NULL, 'account' => 'customer']);

			return response()->json(200, "&nbsp;Supermarket deleted succesfully");

 		}
		

		public function checkSupermarketExpiry()
		{
			$supermarkets = Supermarket::all();

			if(empty($supermarkets))
			{
				echo "No supermarkets found";
				return;
			}

			$today = date("Y-m-d");

			$exipired = 0;

			foreach($supermarkets as $sup)
			{
				if($sup->expires == $today)
				{
					$exipired += 1;

					echo "<div class='card card-body shadow py-1'>{$sup->name} has expired today</div>";
					Supermarket::find($sup->id)->update(['expired' => 1]);
				}
			}

			if($exipired == 0)
			{
				echo alert()->success("&nbsp;No expired supermarkets");
			}
		}


		public function chartsForNumberOfUsers()
		{
			$admins = User::where('account', 'admin')->count('id');
			$visitors = User::where('account', 'customer')->count('id');

			$graphContent = [
				["key" => "Supermarket Admins", "value" => $admins],
				["key" => "Supermarket Visitors", "value" => $visitors]
			];

			echo json_encode($graphContent);
		}

		public function chartsForNumberOfSupermarketUsers()
		{
			$supermarkets = Supermarket::all();

			if(empty($supermarkets))
			{
				return;
			}

			$chartData = array();

			foreach ($supermarkets as $value) {
				# code...
				$supermarket_visitors = SupermarketVisitor::find($value->db_name, "supermarket_name")->count('id');

				$supermarket_visitors = empty($supermarket_visitors) ? 0 : $supermarket_visitors;

				array_push($chartData, ['key' => $value->name, 'value' => $supermarket_visitors]);
			}
			
			echo json_encode($chartData);
		}
}