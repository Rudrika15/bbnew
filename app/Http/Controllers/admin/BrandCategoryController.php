<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrandCategory;
use Illuminate\Http\Request;

class BrandCategoryController extends Controller
{
    public function index()
    {
        $brandCategory = BrandCategory::all();
        return view('admin.brandCategory.index', compact('brandCategory'));
    }
    public function create()
    {
        return view('admin.brandCategory.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'categoryName' => 'required',
        ]);
        $brandCategory = new BrandCategory();
        $brandCategory->categoryName = $request->categoryName;
        $brandCategory->save();
        return redirect()->route('admin.brandCategory.index')->with('success', 'Brand Category Created Successfully');
    }
    public function edit($id)
    {
        $brandCategory = BrandCategory::find($id);
        return view('admin.brandCategory.edit', compact('brandCategory'));
    }
    public function update(Request $request)
    {
        $this->validate(request(), [
            'categoryName' => 'required',
        ]);
        $brandCategory = BrandCategory::find($request->brandCategoryId);
        $brandCategory->categoryName = $request->categoryName;
        $brandCategory->save();
        return redirect()->route('admin.brandCategory.index')->with('success', 'Brand Category Updated Successfully');
    }
    public function delete($id)
    {
        $brandCategory = BrandCategory::find($id);
        $brandCategory->delete();
        return redirect()->route('admin.brandCategory.index')->with('success', 'Brand Category Deleted Successfully');
    }
}
