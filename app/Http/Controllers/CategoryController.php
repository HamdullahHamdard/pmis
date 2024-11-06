<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware("permission:view-categories");
        $this->middleware("permission:create-categories", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-categories", [
            "only" => ["edit", "update"],
        ]);
        $this->middleware("permission:delete-categories", [
            "only" => ["destroy"],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy("id", "ASC")->paginate(10);
        return view("categories.index", compact("categories"))->with(
            "i",
            ($request->input("page", 1) - 1) * 5
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            "name" => $request->name,
        ]);

        Alert::success("نوۍ کټګورۍ په بریالیتوب سره اضافه شوله");

        return redirect("stock/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view("categories.show", compact('$category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view("categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        // ]);

        $category = Category::find($id);
        $category->name = $request->name;

        $category->save();

        Alert::success("د کټګوري معلومات په بریالیتوب سره سم شول");

        return redirect("stock/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        Alert::success("کټګورۍ په بریالیتوب سره له منځه یوړل شوه");

        return redirect("stock/categories");
    }
}
