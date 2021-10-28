<?php 
 namespace App\Models;

use System\Database\DB;
use System\Models\Model;

 class Supermarket extends Model 
 { 

    /**
     * Create a new Supermarket
     *
     * @param string $name
     * @return int|false
     */
    public static function create(string $name)
    {
        $name = "supermarket_" . $name;
        return DB::exec("CREATE DATABASE $name");
    }
 }