<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Supermarket;
use App\Models\User;
use System\Database\DB;
use \System\Http\Request\Request; 

 class SupermarketController extends BaseController 
 { 
 		/**
		* Display a listing of the resource.
		* @return \System\Http\Response\Response
		*/
		public function index()
		{
			//
			$columns = "supermarkets.id, supermarkets.name, supermarkets.created_at,
			supermarkets.expires, users.fname, users.lname, supermarkets.expired, db_name";
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
			if(!$supermarket->save())
			{
				return redirect()->back()->withInput()->with('failed', 'Failed to add supermarket');
			}
	
			DB::exec("CREATE DATABASE IF NOT EXISTS $sup_name");
			DB::import(["supermarket_items.sql", "searched_items.sql"], $sup_name);
			User::where('id', $request->post('owner'))->update(['account' => 'admin']);
			return redirect()->back()->with('success', $request->post('name') . " supermarket created successfully");
 		}

		/**
		* Display the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function show($id)
		{
			// 

 		}

		/**
		* Show the form for editing the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function edit($id)
		{
			// 

 		}

		/**
		* Update the specified resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function update(Request $request)
		{
			// 

 		}

		/**
		* Remove the specified resource from storage.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function destroy($id)
		{
			// 

 		}

}