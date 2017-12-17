<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Book;

class BookController extends Controller
{
    public function index()
    {    
        return array('books' => Book::all());
        // $books = Book::all();
        // $response = ['books' =>$books];
        // return response()->json($response, 200);  //using both methods still made me arrive at thesame answer
    }

    public function store(Request $request)
    {
   
       $book = new Book();
       $book ->name = $request->input('name');
       $book ->Author = $request->input('author');
       $book ->isbn = $request->input('isbn');
       $book ->publisher = $request->input('publisher');
       $book ->year = $request->input('year');
       $book->save();
       return response()->json(['book' =>$book ],201);



        //Book::create($request->all());
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}