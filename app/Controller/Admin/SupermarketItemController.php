<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\SupermarketItem;
use System\Database\DB;
use \System\Http\Request\Request; 

 class SupermarketItemController extends BaseController 
 { 
		 public function __construct()
		 {
			$database = session('user', 'supermarket_queens');
			DB::switchDatabase($database);
		 }
		 
 		/**
		* Display a listing of the resource.
		* @return \System\Http\Response\Response
		*/
		public function index()
		{
			$context = [
				'title' => "DASHBOARD|SUPERMARKET ITEMS",
				'collection' => SupermarketItem::all()
			];

			return render('admin.supermarket.listing', $context);

 		}

		/**
		* Show the form for creating a new resource.
		* @return \System\Http\Response\Response
		*/
		public function create()
		{
			$context = [
				'title' => "DASHBOARD | ADD SUPERMARKET ITEMS"
			];

			return render('admin.supermarket.add_items', $context);
 		}

		/**
		* Store a newly created resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function store(Request $request)
		{
			$request->validate(array(
				'name' => 'required',
				'price' => 'required|numeric',
				'category' => 'required',
				'column_number' => 'required|numeric',
				'position' => 'required'
			));

			//$supermarkt = session('admin')->supermarket;
			//$supermarkt = 'supermarket_queens';
			$supermarktItem = $request->except([crsf()]);
			$supermarktItem['image'] = files()->name('image');
			$uploaded = files()->move('imgs/supermarket/items', 'image');
			if($uploaded === 2)
			{
				return redirect()->back()->withInput()->with('failed',"Only Images are allowed to be uploaded.");
			}
			//DB::switchDatabase($supermarkt);
			$supermarktItem = new SupermarketItem($supermarktItem);
			
			if(!$supermarktItem->save())
			{
				return redirect()->back()->withInput()->with('failed',"Supermarket Item not added. Please try again.");
			}
			return redirect()->back()->with('success', $request->post('name') . " has been added successfully.");
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
		 

		public function categories()
		{
			$context = [
				'title' => "DASHBOARD | SUPERMARKET ITEMS CATEGORIES",
				'collection' => DB::table('supermarket_items')->distinct('category')->get('category')
			];
			return render('admin.supermarket.categories', $context);
		}
}