<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// Bisa juga membuat controller dengan php artisan
// untuk melihat list apa saja yang bisa dilakuan php artisan bisa mengetik command berikut :
// php artisan list

// ! membuat controller dengan php artisan