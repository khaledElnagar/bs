<?php

namespace App\Http\Controllers\admin;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\Amazon;
use Intervention\Image\Image as Img;
use Image;
class BookController extends Controller
{

    /**
     * BookController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $categories = \DB::select('select * from categories where code != parent_code');
        return view('admin.book.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->get('name');
        $book->author = $request->get('author');
        $book->price = $request->get('price');
        $book->description = $request->get('description');
        $book->publish_year = $request->get('publish_year');
        $book->highlight = $request->get('highlight');
        $book->featured_book = $request->get('featured_book');
        if($request->file('image')) {
            $extention = $request->file('image')->getClientOriginalExtension();
            $filename = str_random(13) . '.' . $extention;
            $file = file_get_contents($request->file('image'));
           // $save = file_put_contents("images/" . $filename, $file);
            $save = Image::make($file)->save(storage_path('app/public/images/normal'). '/' .$filename)
                ->resize(550,550)->save(storage_path('app/public/images/thumbnail/550x550'). '/' .$filename)
                ->resize(170,250)->save(storage_path('app/public/images/thumbnail/170x250'). '/' .$filename)
                ->resize(146,219)->save(storage_path('app/public/images/thumbnail/146x219'). '/' .$filename)
                ->resize(80,120)->save(storage_path('app/public/images/thumbnail/80x120'). '/' .$filename)
                ->resize(60,80)->save(storage_path('app/public/images/thumbnail/60x80'). '/' .$filename);

            if ($save) {
                \File::delete(storage_path('app/public/images/thumbnail/550x550'). '/' . $book->image);
                \File::delete(storage_path('app/public/images/thumbnail/146x219'). '/' . $book->image);
                \File::delete(storage_path('app/public/images/thumbnail/170x250'). '/' . $book->image);
                \File::delete(storage_path('app/public/images/thumbnail/80x120'). '/' . $book->image);
                \File::delete(storage_path('app/public/images/thumbnail/60x80'). '/' . $book->image);
                \File::delete(storage_path('app/public/images/normal'). '/' . $book->image);
                $book->image = $filename;
            }
        }
        $book->update_flag = 1;

        $book->update();
        return redirect()->back()->with('status', 'Book Successfully Updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * select data from local store (sqlsrv) and insert it in site server (mysql)
     * @return \Illuminate\Http\RedirectResponse
     */

    public function updateFromSqlSrv(Request $request)
    {

        $items = \DB::connection('sqlsrv')
            ->select('select * from bookdata_balance where group_code = ?', [$request->get('category')]);

        foreach ($items as $item) {
            $book = Book::firstOrNew(array('isbn' => $item->ISBN_CODE));
            $book->name = $item->ITEM_NAME;
            $book->isbn = $item->ISBN_CODE;
            $book->code = $item->ITEM_CODE;
            $book->author = $item->AUTHOR;
            $book->publish_year = $item->PUBLISH_YEAR;
            $book->price = $item->SALE_PRICE;
            $book->category = $item->GROUP_CODE;
            $book->parent_category = $item->MAIN_GROUP_CODE;
            $book->save();
        }
        return redirect()->back()->with('status', 'Book Updated');
    }


    public function updateFromAmazon($isbn)
    {

        $response = $this->amazonRequest($isbn);

        $book = Book::where('isbn', $isbn)->first();

        if (isset($response->Items->Item)) {
            foreach ($response->Items->Item as $result) {
                if ($response->Items->Request->IsValid) {

                    $url = $result->LargeImage->URL;
                    if ($url) {
                        $extention = pathinfo($url, PATHINFO_EXTENSION);
                        $filename = str_random(13) . '.' . $extention;
                        $file = file_get_contents($url);
                        /*
                        $save = file_put_contents("images/" . $filename, $file);
                        */
                        $save = Image::make($file)->save(storage_path('app/public/images/normal'). '/' .$filename)
                            ->resize(550,550)->save(storage_path('app/public/images/thumbnail/550x550'). '/' .$filename)
                            ->resize(170,250)->save(storage_path('app/public/images/thumbnail/170x250'). '/' .$filename)
                            ->resize(146,219)->save(storage_path('app/public/images/thumbnail/146x219'). '/' .$filename)
                            ->resize(80,120)->save(storage_path('app/public/images/thumbnail/80x120'). '/' .$filename)
                            ->resize(60,80)->save(storage_path('app/public/images/thumbnail/60x80'). '/' .$filename);

                        if ($save) {
                            \File::delete(storage_path('app/public/images/thumbnail/550x550'). '/' . $book->image);
                            \File::delete(storage_path('app/public/images/thumbnail/146x219'). '/' . $book->image);
                            \File::delete(storage_path('app/public/images/thumbnail/170x250'). '/' . $book->image);
                            \File::delete(storage_path('app/public/images/thumbnail/80x120'). '/' . $book->image);
                            \File::delete(storage_path('app/public/images/thumbnail/60x80'). '/' . $book->image);
                            \File::delete(storage_path('app/public/images/normal'). '/' . $book->image);
                            $book->image = $filename;
                        }
                        try {

                            $description = $result->EditorialReviews->EditorialReview->Content;
                            if ($description) {

                                $book->description = $description;

                            }


                        } catch (\Exception $e) {

                        }

                        $book->amazon_flag = 1;
                        $book->save();

                        return redirect()->back()->with('status', 'Book data has been updated');

                    }
                }
            }
        }

        return redirect()->back()->withErrors('Something Went Wrong Please Check Again Later !');
    }


    public function amazonRequest($isbn)
    {
        $Amazon = new Amazon();

        $parameters = array(
            "region" => "com",
            "AssociateTag" => 'affiliateTag',
            'ResponseGroup' => 'Medium',
            "Operation" => "ItemLookup",
            "SearchIndex" => "Books",
            "IdType" => "ISBN",
            "ItemId" => $isbn,
        );

        $queryUrl = $Amazon->getSignedUrl($parameters);
        $response = simplexml_load_file($queryUrl);

        return $response;
    }
}
