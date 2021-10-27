<?php
use App\Controller\BaseController;
use System\Http\Request;

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
}