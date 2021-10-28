<?php
use App\Controller\BaseController;
use App\Models\User;
use System\Http\Request\Request;

class Home extends BaseController
{
    public function index() {

        $context = [
            'title' => 'HOME',
        ];
        return render('index', $context);
    }

    public function account()
    {
        $context = [
            'title' => "CREATE ACCOUNT",
        ];
        return render('account', $context); 
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->email = $request->body->email;
        $user->fname = $request->body->fname;
        $user->lname = $request->body->lname;
        $user->phone = $request->body->phone;
        $user->password = password()->hash($request->body->password);
        if(!$user->save())
        {
            $message = alert()->danger('Account not created! please try gain later.');
            return response()->send(500, $message);
        }

        $message = alert()->success("Account created successfully");
        return response()->send(200, $message);
    }
}