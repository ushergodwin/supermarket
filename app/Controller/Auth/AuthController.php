<?php 
 namespace App\Controller\Auth; 
 use App\Controller\BaseController;
use App\Models\Supermarket;
use App\Models\User;
use System\Http\Request\Request;

class AuthController extends BaseController 
 { 

    public function login(Request $request)
    {
        $user = User::find($request->email, 'email')->get();

        if(empty($user))
        {
            return response()->json(202, 'Oops, Account not found!');
        }
        $hash = $user->password;
        if(!password()->verify($request->password, $hash))
        {
            return response()->json(202, 'Oops, Invalid email or passwword');
        }
        $userSession = [
            "email" => $request->email,
            "fname" => $user->fname,
            "lname" => $user->lname,
            "photo" => $user->img_url,
            "id" => $user->id,
            "roles" => explode(',', $user->roles),
            "account_type" => $user->account
        ];

        $message = [
            "alert" => "Authenticated successfully",
            "redirect" => url('user/supermarkets')
        ];

        switch ($user->account) {
            case 'super':
                $message['redirect'] = url('admin/dashboard');
                break;
            case 'admin':
                $supermarket = Supermarket::where('user_id', $user->id)->value('name');
                $userSession["supermarket"] = $supermarket;
                $message['redirect'] = url("supermarket/admin");
                break;
            default:
                $message["redirect"] = url('user/supermarkets');
        }
        session(['user' => array_to_object($userSession)]);
        return response()->json(200, $message);
    }
 }