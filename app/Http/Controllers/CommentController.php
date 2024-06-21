<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function addComment(Request $request, $id) {

        $request->validate([
            'comment' => 'required',
        ]);

        $data =  Comment::insert([
            'product_id' => $id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,

        ]);

        // DB::beginTransaction();

        // Comment::firstOrCreate(['product_id'=>$id, 'user_id'=>auth()->id()]);
        // $product = Product::findOrFail($id);
        // $product->comments;
        // $product->save();
        // DB::commit();

      return redirect('/');


    }


    // public function loadComments($id) {

    //     $comments = Comment::where('product_id', $id)->get();
    //     dd($comments);
    //     return response()->json($comments);

    // }



}
