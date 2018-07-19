<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getChapters(Request $request, $id)
    {
        $b = Book::find($id);
        $chapters = Chapter::select('id', 'name', 'number', 'public')->where('book_id', $id)->get();
        if ($chapters && $b){
            return response()->json([
                'success' => true,
                'count' => count($chapters),
                'bookname' => $b->name,
                'author' => $b->author_name,
                'data' => $chapters
            ], 200);
        }
        return response()->json([
            'success' => false,
            'description' => 'not found book id '.$id
        ], 200);
    }
    public function getChapter(Request $request, $id)
    {
        $chapter = Chapter::find($id);
        if ($chapter){
            return response()->json([
                'success' => true,
                'data' => $chapter
            ], 200);
        }
        return response()->json([
            'success' => false,
            'description' => 'not found chapter id '.$id
        ], 200);
    }
}
