<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CategoryController extends Controller
{
    const PATH_VIEW = "admin.categories.";

    public function index()
    {
        $data = Category::query()->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(StoreCategoryRequest $request)
    {
        $cgr = new Category;
        $cgr->name = $request->name;
        if ($request->hasFile('image')) {
            $url = $request->file('image')->store('categories', 'public');
        } else {
            $url = "";
        }
        $cgr->image = $url;
        $cgr->is_active = $request->is_active;
        
        $cgr->save();
        return redirect('/admin/categories')->with("success", "Thêm mới thành công.");
    }

    public function show(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    public function edit(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
{
    $cgr = Category::findOrFail($category->id);
    $cgr->name = $request->name;

    if ($request->hasFile('image')) {
        if ($cgr->image) {
            Storage::disk('public')->delete($cgr->image);
        }
        $url = $request->file('image')->store('categories', 'public');
        $cgr->image = $url;
        $cgr->updated_at = Carbon::now();
    }
    $cgr->is_active = $request->is_active;

    $cgr->save();
    return redirect('/admin/categories')->with("success", "Cập nhật thành công.");
}

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete($category->image);
        $category->delete();
        return back()->with("success", "Xóa thành công.");
    }
}