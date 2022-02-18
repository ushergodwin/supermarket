<?php 
 namespace App\Controller\User; 
 use App\Controller\BaseController;
use App\Models\SearchedItem;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\Supermarket;
use App\Models\SupermarketItem;
use App\Models\SupermarketVisitor;
use System\Database\DB;
use System\Http\Request\Request;

class DashboardController extends BaseController 
 { 
     public function __construct()
     {
         if(!$this->session()->contains('user'))
         {
             return redirect();
         }
     }


    public function index()
    {
        $context = [
            'title' => "USER | DASHBOARD",
            'collection' => Supermarket::all()
        ];

        return render('user.index', $context);
    }

    public function supermarkets()
    {
        if(!$this->session()->contains('user'))
         {
             return redirect();
         }

        $columns = "supermarkets.id, supermarkets.name, supermarkets.created_at, db_name";
        $context = [
            'title' => "USER | DASHBOARD | SUPERMARKETS",
            'collection' => Supermarket::with(User::class)->where('supermarkets.expired', 0)->get($columns)
        ];

        return render('user.supermarkets', $context);
    }

    public function supermarketItems($supermarket)
    {
        if(!$this->session()->contains('user'))
        {
            return redirect();
        }

        $current_user = session('user')->email;

        $supermarket_visitor = [
            'visitor_email' => $current_user,
            'supermarket_name' => $supermarket,
            'visited_on' => date("Y-m-d H:i:s")
        ];

        $no_of_visits = SupermarketVisitor::where('visitor_email', $current_user)->where('supermarket_name', $supermarket)->get('no_of_visits, visited_on as last_visit');
        
        if(!empty($no_of_visits[0]))
        {
            if(date("Y-m-d", strtotime($no_of_visits[0]->last_visit)) !== date("Y-m-d"))
            {
                SupermarketVisitor::find($current_user, 'visitor_email')->update(['no_of_visits' => ($no_of_visits[0]->no_of_visits + 1), 'visited_on' => date("Y-m-d H:i:s")]);
            }
        }else {
            $visitor = new SupermarketVisitor($supermarket_visitor);
            $visitor->save();
        }

        $db = $supermarket;
        DB::switchDatabase($db);
        $supermarket = str_replace('_', ' ', $supermarket);
        $supermarket = strtoupper($supermarket);
        $context = [
            'title' => "USER | DASHBOARD | SUPERMARKETS | $supermarket",
            'collection' => SupermarketItem::all(),
            'categories' => DB::table('supermarket_items')->distinct('category')->get('category'),
            'supermarket' => $supermarket,
            'db' => $db
        ];

        return render('user.supermarket_items', $context);
    }


    public function supermarketItemsByCategory($supermarket, $category)
    {
        if(!$this->session()->contains('user'))
        {
            return redirect();
        }

        $db = $supermarket;
        DB::switchDatabase($db);
        $supermarket = str_replace('_', ' ', $supermarket);
        $supermarket = strtoupper($supermarket);
        $context = [
            'title' => "USER | DASHBOARD | SUPERMARKETS | $supermarket",
            'collection' => SupermarketItem::where('category', $category)->get(),
            'categories' => DB::table('supermarket_items')->distinct('category')->get('category'),
            'supermarket' => $supermarket,
            'db' => $db,
            'category' => $category
        ];

        return render('user.supermarket_items_cat', $context);
    }

    public function addItemToShoppingList(Request $request)
    {
        $shoppingList = $request->except(['url', crsf()]);
        $lists = ShoppingList::find('active', 'list_status')->get();
        if(empty($lists))
        {
            $url = url('user/dashboard/lists');
            return response()->send(202, alert()->info("&nbsp;You do not have any active list. Please &nbsp; <a href='$url'> Create List</a> &nbsp; and add items."));
        }
        $shoppingList['shopping_list_id'] = $lists->id;
        $shoppingListItem = new ShoppingListItem($shoppingList);
        if(!$shoppingListItem->save())
        {
            return response()->send(202, alert()->danger("Failed to add items in your shopping list. Please try again."));  
        }

        return response()->send(202, alert()->success("Item added to your shopping list successfully.")); 

    }

    public function shoppingLists()
    {
        if(!$this->session()->contains('user'))
        {
            return redirect();
        }
        $context = [
            'title' => "USER | DASHBOARD | SHOPPING LISTS",
            'collection' => ShoppingList::all(),
            'lists' => ShoppingList::all()
        ];

        return render('user.shopping_list', $context);
    }

    public function createShoppingList(Request $request)
    {
        $list = $request->except([crsf()]);
        $list['list_owner'] = session('user')->email;
        $list = new ShoppingList($list);
        if(!$list->save())
        {
            return response()->send(202, alert()->danger("Failed to create the shopping list. Please try again later!"));
        }
        return response()->send(202, alert()->success("Shopping List Created successfully. You can now choose a supermarket and add items."));
    }

    public function searchSupermarketItem()
    {
        $supermarket = request()->params->supermarket;
        $item = request()->params->item;

        $current_user = session('user')->email;

        $supermarket_visitor = [
            'visitor_email' => $current_user,
            'supermarket_name' => $supermarket,
            'visited_on' => date("Y-m-d H:i:s")
        ];

        $no_of_visits = SupermarketVisitor::where('visitor_email', $current_user)->where('supermarket_name', $supermarket)->get('no_of_visits, visited_on as last_visit');
        
        if(!empty($no_of_visits[0]))
        {
            if(date("Y-m-d", strtotime($no_of_visits[0]->last_visit)) !== date("Y-m-d"))
            {
                SupermarketVisitor::find($current_user, 'visitor_email')->update(['no_of_visits' => ($no_of_visits[0]->no_of_visits + 1), 'visited_on' => date("Y-m-d H:i:s")]);
            }
        }else {
            $visitor = new SupermarketVisitor($supermarket_visitor);
            $visitor->save();
        }

        if(empty($supermarket))
        {
            return response()->send(202, alert()->info("Please select a supermarket and try again"));
        }

        if(empty(trim($item)))
        {
            return;
        }

        $item_name = "%$item%";
        DB::switchDatabase($supermarket);
        $supermarketItem = DB::table('supermarket_items')->like('name', $item_name)->get();

        if(isset($_GET['suggest']))
        {
            foreach($supermarketItem as $item)
            {
                $name =  $item->name;
                echo '<div class="card card-body shadow py-1 mt-1"> <a href="javascript:void(0)" class="stretched-link" onclick="autoFillSearch(\'' . $name .'\')">' . $name . '</a> </div>';
            }
            return;
        }
                
        if(!empty($supermarketItem))
        {

            foreach($supermarketItem as $item): 

                $no_of_searches = SearchedItem::find($item->id, 'item_id')->value('number_of_searches');
                $item_exits = !empty($no_of_searches) ? true : false;
                $no_of_searches = empty($no_of_searches) ? 1 : ($no_of_searches + 1);

                $searchedItem = [
                    'item_id' => $item->id,
                    'number_of_searches' => $no_of_searches,
                    'searched_item_name' => $item->name
                ];

                if($item_exits)
                {
                    $searchedItem = [
                        'number_of_searches' => $no_of_searches
                    ];
                    SearchedItem::where('item_id', $item->id)->update($searchedItem);
                }else {
                    $searchedItem = new SearchedItem($searchedItem);
                    $searchedItem->save();
                }

                echo '<div class="col-lg-4 mt-2">
                        <div class="card mt-3">
                            <div class="card-body shadow">
                                <img src="'. asset('imgs/supermarket/items/' . $item->image) .'" alt="item photo" class="card-img item-img rounded"/>
                                <h4 class="font-weight-bold"><u>'. $item->name .'</u></h4>
                                <h6 class="mt-1">Price: UGX'. number_format($item->price, 2) .' /=</h6>
                                <h6 class="mt-1 text-muted">Location: Column '. $item->column_number .', on the ' . strtoupper(str_replace('-', ' ', $item->position)) .' side.</h6>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:;" class="stretched-link shopping-list"
                                data-item_name="' . $item->name .'"
                                data-item_price="'. $item->price .'"
                                data-item_column_number="'. $item->column_number .'"
                                data-item_position="'. $item->position .'"
                                data-supermarket="'. $supermarket .'"
                                data-url="' . url("user/dashboard/shopping-list") .'"
                                data-_token="'.  _token() .'"> Add Items to Shopping List
                                    <span data-feather="shopping-cart" class="nav-icon"></span> 
                                </a>
                            </div>
                        </div>
                
                    </div>';
            
            endforeach;
            return;
        }

        $supermarketItem = DB::table('searched_items')->like('searched_item_name', $item_name)->get('number_of_searches, item_id');

        if(!empty($supermarketItem))
        {
            $searchedItem = [
                'number_of_searches' => ($supermarketItem[0]->number_of_searches + 1),
                'searched_item_name' => request()->params->item
            ];
            SearchedItem::where('item_id', $supermarketItem[0]->item_id)->update($searchedItem);
        }else {
            $itemNotFound = [
                'item_id' => random_int(1, 999),
                'searched_item_name' => request()->params->item,
                'number_of_searches' => 1,
                'search_status' => 'not found'
            ];
            $searchedItem = new SearchedItem($itemNotFound);
            $searchedItem->save();
        }
        return response()->send(200, alert()->failure(" No item was found!"));
    }


    public function markShoppingListShopped(Request $request)
    {
        $list_id = $request->body->list_id;
        ShoppingList::find($list_id)->update(['list_status' => 'diactivated']);
        return response()->send(200, alert()->success("List Marked shopped successfully!"));   
    }


    public function searchSupermarketItemByName()
    {
        if(!$this->session()->contains('user'))
        {
            return redirect();
        }

        $request = new Request();
        $supermarket = $request->params->q;
        $category = trim($request->params->item);

        $db = $supermarket;
        DB::switchDatabase($db);
        $supermarket = str_replace('_', ' ', $supermarket);
        $supermarket = strtoupper($supermarket);
        $context = [
            'title' => "USER | DASHBOARD | SUPERMARKETS | $supermarket",
            'collection' => DB::table('supermarket_items')->like('name', "%$category%")->get(),
            'categories' => DB::table('supermarket_items')->distinct('category')->get('category'),
            'supermarket' => $supermarket,
            'db' => $db,
            'category' => $category
        ];

        $supermarketItem = DB::table('searched_items')->like('searched_item_name', $category)->get('number_of_searches, item_id');

        if(!empty($supermarketItem))
        {
            $searchedItem = [
                'number_of_searches' => ($supermarketItem[0]->number_of_searches + 1),
                'searched_item_name' => request()->params->item
            ];
            SearchedItem::where('item_id', $supermarketItem[0]->item_id)->update($searchedItem);
        }else {
            $itemNotFound = [
                'item_id' => random_int(1, 999),
                'searched_item_name' => request()->params->item,
                'number_of_searches' => 1,
                'search_status' => 'not found'
            ];
            $searchedItem = new SearchedItem($itemNotFound);
            $searchedItem->save();
        }
        return render('user.supermarket_item_search', $context);
    }
 }