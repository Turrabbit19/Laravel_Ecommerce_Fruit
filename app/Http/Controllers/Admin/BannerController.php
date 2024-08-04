<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BannerController extends Controller
{
    const PATH_VIEW = "admin.banners.";

    public function index()
    {
        $data = Banner::latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(StoreBannerRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $url = $request->file('image')->store('banners', 'public');
        } else {
            $url = "";
        }
        $data['image'] = $url;
        
        Banner::create($data);
        return redirect('/admin/banners')->with("success", "Thêm mới thành công.");
    }

    public function show(Banner $banner)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $data = $request->validated();
    
        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $url = $request->file('image')->store('banners', 'public');
            $data['image'] = $url;
        }
        $data['updated_at'] = Carbon::now();
    
        $banner->update($data);
        return redirect('/admin/banners')->with("success", "Cập nhật thành công.");
    }

    public function destroy(Banner $banner)
    {
        Storage::disk('public')->delete($banner->image);
        $banner->delete();
        return redirect()->back()->with('success', "Xóa thành công.");
    }
}