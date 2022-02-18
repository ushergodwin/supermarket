<?php
namespace App\Controller\Admin;
use App\Controller\BaseController;
use App\Models\ChatRequest;
use App\Models\User;
use System\Database\DB;

class AdminController extends BaseController
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
            'title' => 'ADMIN DASHBOARD'
        ];

        return render('admin.dashboard', $context);
    }



    public function transactions()
    {
        $columns = "transactions.amount, transactions.transaction_id, transactions.transaction_at as dated, transactions.expires_on, users.fname, users.lname, users.id as user_id, supermarkets.name, supermarkets.id as sup_id";

        $collection = DB::table('transactions')->join('users', 'transactions.email', 'users.email')->join('supermarkets', 'users.has_supermarket', 'supermarkets.id');

        if(session('user')->account_type == 'admin')
        {
            $collection->where('supermarkets.db_name', session('user')->supermarket);
        }

        $collection = $collection->get($columns);

        $context = [
            'title' => 'ADMIN DASHBOARD | TRANSACTIONS',
            'collection' => $collection
        ];
        return render('admin.transactions', $context);
    }


    public function settings()
    {
        $context = [
            'title' => "DASHBOARD | SETTINGS",
            'collection' => User::find(session('user')->email, 'email')->get()
        ];

        return render('admin.settings', $context);
    }

    public function profile()
    {
        $collection = User::find(session('user')->email, 'email')->get();

        if(session('user')->account_type == 'admin')
        {
            $collection = DB::table('users')->join('supermarkets', 'supermarkets.id', 'users.has_supermarket')->where('email', session('user')->email)->get()[0];
        }

        $context = [
            'title' => "DASHBOARD | SETTINGS",
            'collection' => $collection
        ];

        return render('admin.profile', $context);
    }


    public function support()
    {

        $columns = "chat_requests.id as chat_id, chat_requests.sent_on, chat_requests.sent_at, chat_requests.session_id, chat_requests.reason, chat_requests.request_status as chat_status, users.status as user_status, users.fname, users.lname";

        $context = [
            'title' => "ADMIN DASHBOARD | SUPPORT",
            'chat_requests' => DB::table('chat_requests')->join('users', 'chat_requests.request_by', 'users.email')->orderBy('sent_on', 'DESC')->get($columns),
            'online' => User::where('status', 'online')->get()
        ];

        return render('chat.super.support', $context);

    }

    public function helpCenter($session_id)
    {

        $context = [
            'title' => "ADMIN DASHBOARD | SUPPORT",
            'chat_requests' => ChatRequest::join('users', 'chat_requests.respondent', 'users.email')->where('request_by', session('user')->email)->where('session_id', $session_id)->get('users.email, users.fname, users.lname, chat_requests.session_id')
        ];

        return render('chat.admin.chat', $context);

    }

    public function requeestChat()
    {

        $context = [
            'title' => "ADMIN DASHBOARD | SUPPORT",
            'chat_requests' => ChatRequest::where('request_by', session('user')->email)->orderBy('request_status', "DESC")->get()
        ];

        return render('chat.admin.help', $context);

    }


    public function usersActiveStatus()
    {
        $online_users = User::all();

        if(property_exists(session('user'), 'supermarket'))
        {
            $online_users = User::where('status', 'online')->get();
        }

        $avater = asset('img/team-1.png');
        
        foreach($online_users as $user)
        {
            if($user->status == 'online')
            {
                echo '
                    <li class="author-online has-new-message">
                        <div class="user-avater">
                            <img src=" ' . $avater .'" alt="">
                        </div>
                        <div class="user-message">
                            <p>
                                <a href="" class="subject stretched-link text-truncate"
                               style="max-width: 180px;">'. $user->fname . " {$user->lname}" .'</a>
                                <span class="time-posted">online</span>
                            </p>
                            <p>
                                <span class="desc text-truncate" style="max-width: 215px;">'. $user->email . '</span>
                            </p>
                         </div>
                    </li>';
            }else {
                echo '
                <li class="author-online has-new-message">
                    <div class="user-avater">
                        <img src=" ' . $avater .'" alt="">
                    </div>
                    <div class="user-message">
                        <p>
                            <a href="#" class="subject stretched-link text-truncate"
                           style="max-width: 180px;">'. $user->fname . " {$user->lname}" .'</a>
                            <span class="time-posted text-warning">offline</span>
                        </p>
                        <p>
                            <span class="desc text-truncate" style="max-width: 215px;">'. $user->email . '</span>
                        </p>
                     </div>
                </li>';
            }
        }
    }
}