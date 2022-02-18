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
            "account_type" => $user->account,
            "phone_no" => $user->phone
        ];

        $message = [
            "message" => "Authenticated successfully",
            "redirect" => url('user/dashboard')
        ];

        switch ($user->account) {
            case 'super':
                $message['redirect'] = url('admin/dashboard');
                break;
            case 'admin':
                $message['redirect'] = url("admin/dashboard");
                $sup = Supermarket::find($user->has_supermarket)->get('db_name, expired, expires, fee');
                $supermarket = $sup->db_name;
                $userSession["supermarket"] = $supermarket;
                if($sup->expired == 1)
                {
                    $message['redirect'] = url("supermarket/account/expired");
                    $userSession["expiry_date"] = $sup->expires;
                    $userSession['fee'] = $sup->fee;

                    session(['guest' => array_to_object($userSession)]);
                    return response()->json(200, $message);
                }
                break;
            default:
                $message["redirect"] = url('user/dashboard');
        }
        User::find($user->id)->update(['status' => 'online']);

        session(['user' => array_to_object($userSession)]);
        return response()->json(200, $message);
    }

    public function logout()
    {
        User::find(session('user')->id)->update(['status' => 'offline']);
        return $this->session()->end();
    }
 }