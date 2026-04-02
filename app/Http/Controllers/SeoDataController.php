<?php

namespace App\Http\Controllers;

use App\Models\SeoData;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

class SeoDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SeoData::latest()->get(); // অথবা আপনার পছন্দ অনুযায়ী কোয়েরি
            return DataTables::of($data)
                ->addIndexColumn() // সিরিয়াল নম্বরের জন্য (DT_RowIndex)
                ->addColumn('actions', function($row){
                    // অ্যাকশন বাটন (Edit, Delete) এখানে যোগ করুন
                    $editBtn = '<a href="'.route('seo-data.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>';
                    $deleteBtn = '<form action="'.route('seo-data.destroy', $row->id).'" method="POST" style="display:inline-block;">
                                    '.csrf_field().'
                                    '.method_field('DELETE').'
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                                  </form>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['actions']) // HTML রেন্ডার করার জন্য
                ->make(true);
        }

        // যদি সাধারণ HTTP রিকোয়েস্ট হয়, তাহলে ভিউ দেখান
        return view('admin.seo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    // Define fixed route names based on your routes
    $routeNames = [
        'home',
        'about',
        'service',
        'conferenc',
        'flybd',
        'abroads.font',
        'blog',
        'abroad.university',
        'study.abroad.university',
        'abroad',
        'abroad-living'
    ];

    return view('admin.seo.create', compact('routeNames'));
}


    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
{
    $validatedData = $request->validate([
        // 'route_name' => 'required|string|max:255|unique:seo_data,route_name',
        'route_name' => 'required|string|max:255',
        'seo_title' => 'nullable|string|max:255',
        'seo_description' => 'nullable|string',
        'seo_keywords' => 'nullable|string',
        'seo_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $seoData = SeoData::create($validatedData);

    if ($request->hasFile('seo_image')) {
        $image = $request->file('seo_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);
        $seoData->seo_image = $imageName;
        $seoData->save();
    }

    return redirect()->route('seo-data.index')->with('success', 'SEO Data created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(SeoData $seoData) // রুট মডেল বাইন্ডিং ব্যবহার করা হয়েছে
    {
        return view('admin.seo.show', compact('seoData')); // নির্দিষ্ট SEO ডেটা দেখানোর ভিউ
    }

    /**
     * Show the form for editing the specified resource.
     */
    //  public function edit(SeoData $seoData)
    // {
    //     return view('admin.seo.edit', compact('seoData')); // SEO ডেটা এডিট করার ফর্ম দেখানোর ভিউ
    // }

   public function edit($id)
{
     $routeNames = [
        'home',
        'about',
        'service',
        'conferenc',
        'flybd',
        'abroads.font',
        'blog',
        'abroad.university',
        'study.abroad.university',
        'abroad',
        'abroad-living'
    ];
    $seoData = SeoData::findOrFail($id);
    return view('admin.seo.edit', compact('seoData','routeNames'));  // Ensure seoData is passed to the view
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    // Validate request data
    $validatedData = $request->validate([
        'route_name' => 'required|string|max:255',
        'seo_title' => 'nullable|string|max:255',
        'seo_description' => 'nullable|string',
        'seo_keywords' => 'nullable|string',
        'seo_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Fetch the existing SEO data
    $seoData = SeoData::findOrFail($id);

    // যদি নতুন ইমেজ আপলোড হয়
    if ($request->hasFile('seo_image')) {
        // পুরোনো ইমেজ থাকলে ডিলিট করো
        if ($seoData->seo_image && file_exists(public_path('uploads/' . $seoData->seo_image))) {
            @unlink(public_path('uploads/' . $seoData->seo_image));
        }

        $image = $request->file('seo_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $validatedData['seo_image'] = $imageName;
    }

    // Update the SEO data with validated input
    $seoData->update($validatedData);

    // Redirect back with success message
    return redirect()->route('seo-data.index')->with('success', 'SEO Data updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(SeoData $seoData)
// {
//     // যদি ইমেজ ফাইল থাকে, তাহলে সেটাও ডিলিট করা হবে
//     if ($seoData->seo_image && file_exists(public_path('uploads/' . $seoData->seo_image))) {
//         @unlink(public_path('uploads/' . $seoData->seo_image));
//     }

//     // তারপর ডাটাবেস থেকে রেকর্ড ডিলিট করা হবে
//     $seoData->delete();

//     return redirect()->route('seo-data.index')->with('success', 'SEO Data deleted successfully.');
// }

  public function delete($id){
        $seoData = SeoData::find($id);
        $seoData->delete();
        return redirect()->route('seo-data.index')->with('success', 'seoData deleted successfully');
    }



      public static function getSeoDataForRoute(string $routeName): ?SeoData
    {
        return SeoData::where('route_name', $routeName)->first();
    }
}
