<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Supermarket;
use App\Models\SupermarketItem;
use App\Models\User;
use System\Database\DB;
use \System\Http\Request\Request; 

 class SupermarketItemController extends BaseController 
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
			DB::switchDatabase(session('user')->supermarket);
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


			$supermarktItem = $request->except([crsf()]);
			$supermarktItem['image'] = files()->name('image');
			$uploaded = files()->move('imgs/supermarket/items', 'image');
			if($uploaded === 2)
			{
				return redirect()->back()->withInput()->with('failed',"Only Images are allowed to be uploaded.");
			}
			$supermarktItem = new SupermarketItem($supermarktItem);
			
			DB::switchDatabase(session('user')->supermarket);

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
			DB::switchDatabase(session('user')->supermarket);

			$supermarketItemDetails = SupermarketItem::find($id)->get();

			$context = [
				'title' => "DASHBOARD | EDIT SUPERMARKET ITEM",
				'collection' => $supermarketItemDetails
			];

			return render('admin/supermarket/item_details', $context);

 		}

		/**
		* Show the form for editing the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function edit($id)
		{
			
			$supermarket = session('user')->supermarket;
			DB::switchDatabase($supermarket);

			$supermarketItemDetails = SupermarketItem::find($id)->get();

			$context = [
				'title' => "DASHBOARD | EDIT SUPERMARKET ITEM",
				'collection' => $supermarketItemDetails
			];

			return render('admin/supermarket/edit_item', $context);

 		}

		/**
		* Update the specified resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function update(Request $request)
		{
			// 
			$supermarktItem = $request->except([crsf(), '_method', 'id']);

			if(isset($_FILES['image']) && !empty($_FILES['image']['name']))
			{
				$supermarktItem['image'] = files()->name('image');
				$uploaded = files()->move('imgs/supermarket/items', 'image');
				
				if($uploaded === 2)
				{
					return redirect()->back()->withInput()->with('failed',"Only Images are allowed to be uploaded.");
				}
			}
			
			DB::switchDatabase(session('user')->supermarket);

			if(!SupermarketItem::find($request->post('id'))->update($supermarktItem))
			{
				return redirect()->back()->withInput()->with('failed',"Supermarket Item not updated. Please try again.");
			}
			return redirect()->back()->with('success', $request->post('name') . "'s details has been updated successfully.");
 		}

		/**
		* Remove the specified resource from storage.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function destroy($id)
		{
			// 
			if(!empty($id))
			{
				DB::switchDatabase(session('user')->supermarket);
				if(!SupermarketItem::find($id)->update(['deleted_at' => date('Y-m-d H:i:s')]))
				{
					return response()->json(202, "Item not deleted. Please try again.");
				}
				return response()->json(200, "Item deleted successfully");
			}
 		}
		 

		public function categories()
		{
			DB::switchDatabase(session('user')->supermarket);
			$context = [
				'title' => "DASHBOARD | SUPERMARKET ITEMS CATEGORIES",
				'collection' => DB::table('supermarket_items')->distinct('category')->get('category'),
				'most_searched_categories' => $this->mostSearchedCategories()
			];
			return render('admin.supermarket.categories', $context);
		}


		public function searchedItems($file)
		{
			
			DB::switchDatabase(session('user')->supermarket);
			$collection = DB::table('searched_items')->leftJoin('supermarket_items', 'searched_items.item_id', 'supermarket_items.id')->
			where('search_status', $file)->get();
			if($file == 'most-searched')
			{
				$collection = DB::table('searched_items')->leftJoin('supermarket_items', 'searched_items.item_id', 'supermarket_items.id')->orderBy('number_of_searches', "DESC")->limit(10)->get();	
			}

			$file = str_replace('-', ' ', $file);

			$context = [
				'title' => "DASHBOARD | SUPERMARKET ITEMS | " . strtoupper($file),
				'collection' => $collection,
				'status' => strtoupper($file),
				'is_most_searched' => $file == "most searched" ? true : false
			];
			return render("admin.supermarket.searched_items", $context);
		}


		public function mostSearchedCategories()
		{
			DB::switchDatabase(session('user')->supermarket);
			$searched_items = DB::table('searched_items')->orderBy('number_of_searches', "DESC")->limit(10)->get();

			$most_searched_categories = [];

			if(!empty($searched_items))
			{
				foreach($searched_items as $item)
				{
					$category = DB::table('supermarket_items')->where("id", $item->item_id)->get('category as name');

					if(!empty($category))
					{
						array_push($most_searched_categories, ['key' => $category[0]->name, 'value' => $item->number_of_searches]);
					}
				}
			}

			return array_to_object($most_searched_categories);
		}


	public function charts()
	{
		$request = new Request();

		$q = $request->get('q');

		if($q == 'most_searched_categories')
		{
			$most_searched_categories = [];
			foreach($this->mostSearchedCategories() as $value)
			{
				array_push($most_searched_categories, object_to_array($value));
			}

			echo json_encode($most_searched_categories);
			return;
		}

		if($q == 'most_searched_items')
		{
			DB::switchDatabase(session('user')->supermarket);
			$collection = DB::table('searched_items')->orderBy('number_of_searches', "DESC")->limit(10)->get();

			$most_searched_items = [];

			foreach($collection as $value)
			{
				array_push($most_searched_items, ['key' => $value->searched_item_name, 'value' => $value->number_of_searches]);
			}

			echo json_encode($most_searched_items);
			return;
		}
	}
}