<?php 
 namespace App\Controller\User; 
 use App\Controller\BaseController;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\Supermarket;
use App\Models\SupermarketItem;
use System\Database\DB;
use System\Http\Request\Request;

class DashboardController extends BaseController 
 { 
    public function index()
    {
        $context = [
            'title' => "USER | DASHBOARD"
        ];

        return render('user.index', $context);
    }

    public function supermarkets()
    {
        $columns = "supermarkets.id, supermarkets.name, supermarkets.created_at, db_name";
        $context = [
            'title' => "USER | DASHBOARD | SUPERMARKETS",
            'collection' => Supermarket::with(User::class)->where('supermarkets.expired', 0)->get($columns)
        ];

        return render('user.supermarkets', $context);
    }

    public function supermarketItems($supermarket)
    {
        DB::switchDatabase($supermarket);
        $supermarket = str_replace('_', ' ', $supermarket);
        $supermarket = strtoupper($supermarket);
        $context = [
            'title' => "USER | DASHBOARD | SUPERMARKETS | $supermarket",
            'collection' => SupermarketItem::all(),
            'categories' => DB::table('supermarket_items')->distinct('category')->get('category'),
            'supermarket' => $supermarket
        ];

        return render('user.supermarket_items', $context);
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
        $list['list_owner'] = 'ascendemmy9@gmail.com';
        $list = new ShoppingList($list);
        if(!$list->save())
        {
            return response()->send(202, alert()->danger("Failed to create the shopping list. Please try again later!"));
        }
        return response()->send(202, alert()->success("Shopping List Created successfully. You can now choose a supermarket and add items."));
    }
 }