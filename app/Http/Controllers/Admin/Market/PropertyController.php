<?php

namespace App\Http\Controllers\Admin\market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;
use App\Models\Market\Brand;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $category_attributes = CategoryAttribute::all();
        return view('admin.market.property.index' , compact('category_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.property.create' , compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store ( CategoryAttributeRequest $request )
    {
        $inputs            = $request->all();
        $categoryAttribute = CategoryAttribute::create($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success' , 'فرم جدید با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show ( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ( CategoryAttribute $categoryAttribute )
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.property.edit' , compact('categoryAttribute' , 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update ( CategoryAttributeRequest $request , categoryAttribute $categoryAttribute )
    {
        $inputs = $request->all();
        $categoryAttribute->update($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success' , 'فرم کالا با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ( categoryAttribute $categoryAttribute )
    {
        $result = $categoryAttribute->delete();
        return redirect()->route('admin.market.property.index')->with('swal-success' , 'فرم کالای مورد نظر با موفقیت حذف شد.');
    }
}
