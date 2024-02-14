<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view("admin.categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //pass to the admin all the categories
        $categories = Category::all();
        return view('admin.categories.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formFields = $request->validate([
            "name" => "required|min:3"
        ]);
        if (Auth::user()->hasRole("admin")) {
            $category = Category::create($formFields);
            return redirect("/admin/dashboard")->with(["success", "category created successfully"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $category)
    {
        //
        if (Auth::user()->hasRole("admin")) {
            $category->delete();
            return redirect("/admin/dashboard")->with("success", "The Category Deleted Successfully");
        }
    }
}
