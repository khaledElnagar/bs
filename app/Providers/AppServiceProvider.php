<?php

namespace App\Providers;

use App\Book;
use App\Contact;
use App\Details;
use App\User;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $contact = Contact::first();
        $menu_categories = DB::select('select * from categories where parent_code = code limit 10');
        $menu_special = Book::where('featured_book',1)->get();
        view()->share('menu_categories',$menu_categories);
        view()->share('menu_special',$menu_special);
        view()->share('contact',$contact);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
