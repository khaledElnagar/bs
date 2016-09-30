<?php
/**
 * Created by PhpStorm.
 * User: KAT
 * Date: 26/09/2016
 * Time: 06:31 م
 */

namespace App\Http\ViewComposers;

use App\Book;
use App\Details;
use Illuminate\View\View;

class AppComposer
{
    /**
     * The logged in user.
     *
     */

    public function __construct()
    {
    }

    public function compose(View $view)
    {

    }

}