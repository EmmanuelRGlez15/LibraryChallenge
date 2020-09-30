<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        foreach($books as $book){
            $book['category'] = $book->category->name;
            if(is_null($book->user_id)){
                $book['status'] = 'Available';
            }else{
                $book['status'] = 'Unavailable';
            }
        }

        return response()->json($books);
    }

    public function indexByCategory($category_id)
    {
        $books = Book::where('category_id', $category_id)->get();
        return response()->json($books);
    }

    public function indexByUser($user_id)
    {
        $books = Book::where('user_id', $user_id)->get();
        return response()->json($books);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        Book::findOrFail($id)->update($request->all());
        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return response()->json(true);
    }

    public function returnBook($id)
    {
        Book::findOrFail($id)->update([ 'user_id' => null ]);
        return response()->json(true);
    }

    public function lend(Request $request, $id)
    {
        Book::findOrFail($id)->update($request->all());
        return response()->json(true);
    }

    public function user($id)
    {
        $book = Book::findOrFail($id);
        $book->user;
        return response()->json($book->user);
    }
}
