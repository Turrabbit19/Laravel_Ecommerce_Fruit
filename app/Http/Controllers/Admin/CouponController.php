<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use Carbon\Carbon;

class CouponController extends Controller
{
    const PATH_VIEW = "admin.coupons.";

    public function index()
    {
        $data = Coupon::latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();
        
        Coupon::create($data);
        return redirect('/admin/coupons')->with("success", "Thêm mới thành công.");
    }

    public function show(Coupon $coupon)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('coupon'));
    }

    public function edit(Coupon $coupon)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('coupon'));
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $data = $request->validated();
        $data['updated_at'] = Carbon::now();

        $coupon->update($data);
        return redirect('/admin/coupons')->with("success", "Cập nhật thành công.");
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with('success', "Xóa thành công.");
    }
}