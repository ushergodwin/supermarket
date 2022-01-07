<?php
namespace App\Controller\Admin;
use App\Controller\BaseController;
use App\Models\User;

class AdminController extends BaseController
{

    public function index()
    {
        $context = [
            'title' => 'DASHBOARD | USERS'
        ];

        return render('admin.dashboard', $context);
    }

}