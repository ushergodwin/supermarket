<?php

use App\Controller\BaseController;

class AdminController extends BaseController
{

    public function index()
    {
        $context = [
            'title' => 'DASHBOARD'
        ];

        return render('admin.dashboard', $context);
    }
}