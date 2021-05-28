<?php
namespace App\Models;

use CodeIgniter\Model;

include APPPATH . 'ThirdParty/bluefaces/BL_DbModel.php';
use BL_Database\BL_DbModel;

class AuthModel extends Model
{
    protected $_db;
    public function auth_user(string $user_id, string $password){
        $this->_db = new BL_DbModel();
        $this->_db->setDatabase("supermarket_main");
        if (!strpos($user_id, '@')) {
            $this->_db->where(["phone_no" => $user_id]);
            try {
                $user = $this->_db->getObject('fname, lname, password, account_type', 'users');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            if (!empty($user)) {
                $auth = password_verify($password, $user->password);
                if ($auth) {
                    if ($user->account_type == 1){
                        return ["status" => "Authenticated", "userName" => $user->fname, "redirect" => 'admin/dashboard'];
                    }else if ($user->account_type == 2){
                        return ["status" => "Authenticated", "userName" => $user->fname, "redirect" => 'admin/dashboard'];
                    }else {
                        return ["status" => "Authenticated", "userName" => $user->fname, "redirect" => 'user/dashboard'];
                    }
                }else {
                    return ["status" => "Oops, Invalid login details", "reg" => $user_id, "redirect" => 'supermarket/admin/dashboard'];
                }
            }else{
                return ["status" => "Oops, there is no account that matches your login details", "reg" => $user_id];
            }
        }else {
            $this->_db->where(["email" => $user_id]);
            try {
                $user = $this->_db->getObject('fname, lname, password', 'users');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            if (!empty($user)) {
                $auth = password_verify($password, $user->password);
                if ($auth) {
                    if ($user->account_type == 1){
                        return ["status" => "Authenticated", "userName" => $user->fname, "redirect" => 'admin/dashboard'];
                    }else if ($user->account_type == 2){
                        return ["status" => "Authenticated", "userName" => $user->fname, "redirect" => 'admin/dashboard'];
                    }else {
                        return ["status" => "Authenticated", "userName" => $user->fname, "redirect" => 'user/dashboard'];
                    }
                }else {
                    return ["status" => "Oops, Invalid login details", "userName" => $user->fname, "redirect" => 'supermarket/admin/dashboard'];
                }
            }else{
                return ["status" => "Oops, there is no account that matches your login details", "email" => $user_id];
            }

        }
    }
}
