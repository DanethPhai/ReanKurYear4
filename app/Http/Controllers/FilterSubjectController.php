<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subject;
use Illuminate\Http\Request;

class FilterSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $subjects = Subject::all();
        $products = Product::query();

        if(isset($request->subject ) && ($request->subject != null))
        {
            $products->whereHas('subject', function($q) use ($request){
                $q->whereIn('id', $request->subject);
            });
        }
        $products = $products->get();
        return view('product.index', compact('products', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.categories.create-category');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required | unique:subjects',
    //     ]);

    //     $name = $request->input('name');
    //     $subject = new Subject();
    //     $subject->name = $name;

    //     $subject->save();

    //     return redirect()->back()->with('status', 'Category added');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */

    // public function show(Subject $subject)
    // {
    //     $subjects = Subject::all();
    //     return view('ebookpost.create', compact('subjects'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Subject $subject)
    // {
    //     return view('admin.categories.edit-category', compact('subject'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Subject $subject)
    // {
    //     $request->validate([
    //         'name' => 'required | unique:categories',
    //     ]);

    //     $name = $request->input('name');
    //     $subject->name = $name;
    //     $subject->save();
    //     return redirect(route('category.index'))->with('status', 'Category updated');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */

    // public function destroy(Subject $category)
    // {
    //     $category->delete();
    //     return redirect()->back()->with('status', 'Category deleted');
    // }
}
