<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    //

  /**
     * @return View
     */
    public function index(): View
    {
        $sliders = Slider::all();

        // dd($sliders);

        return view("admin.sliders.index", compact("sliders"));
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return view("admin.sliders.create");
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    // Form Validation
    $request->validate([
        "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
    ]);

    try {
        $slider = new Slider();
        $slider->fill([
            "title" => $request->input("title"),
            "subtitle" => $request->input("subtitle"),
            "sort" => $request->input("sort"),
            "status" => $request->input("status"),
        ]);

        // Debug point: Check input values before storing the image
        // Check the input data
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $imageName = time() . "." . $image->getClientOriginalExtension();

            // If updating an existing slider, delete the old image
            if ($slider->exists) {
                // Get the old image path from the database
                $oldImagePath = $slider->image;

                // If old image exists, delete it from the public/uploads folder
                if ($oldImagePath && file_exists(public_path('uploads/' . $oldImagePath))) {
                    unlink(public_path('uploads/' . $oldImagePath));
                }
            }

            // Save the new image to the uploads folder
            $image->move(public_path('uploads'), $imageName);
            $slider->image = $imageName; // Set the new image name in the model
        }

        $slider->save();

        // Debug point: Check slider data after save
        // Check if slider is saved properly
    } catch (QueryException $exception) {
        return redirect()
            ->back()
            ->withInput()
            ->with("error", "QueryException code: " . $exception->getCode());
    }

    return redirect()->route('slider.index')->with("success", "Slider has been inserted successfully.");
}

    /**
     * @param Slider $slider
     * @return View
     */
    public function show(Slider $slider): View
    {
        return view("admin.sliders.show", compact("slider"));
    }

    /**
     * @param Slider $slider
     * @return View
     */
    public function edit(Slider $slider): View
{


    return view("admin.sliders.edit", compact("slider"));
}


    /**
     * @param Request $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(Request $request, Slider $slider): RedirectResponse
    {
        // Form Validation
        $request->validate([
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $oldImagePath = $slider->__get("image");

        try {
            $slider->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "sort" => $request->input("sort"),
                "status" => $request->input("status"),
            ]);
            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $imageName = time() . "." . $image->getClientOriginalExtension();

                // If updating an existing slider, delete the old image
                if ($slider->exists && $slider->image) {
                    // Get the old image path from the database
                    $oldImagePath = $slider->image;

                    // If old image exists, delete it from the public/uploads folder
                    if ($oldImagePath && file_exists(public_path('uploads/' . $oldImagePath))) {
                        unlink(public_path('uploads/' . $oldImagePath));
                    }
                }

                // Save the new image to the uploads folder
                $image->move(public_path('uploads'), $imageName);
                $slider->image = $imageName; // Set the new image name in the model
            }

            $slider->save();
        } catch (QueryException $exception) {
            return redirect()->back()->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route("slider.index")->with("success", "Slider has been updated successfully.");
    }

    /**
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        try {
            $imagePath = $slider->__get("image");

            if ($imagePath && Storage::exists("public/uploads/" . $imagePath)) {
                Storage::delete("public/uploads/" . $imagePath);
            }

            $slider->delete();
        } catch (Exception $exception) {
            return redirect()->back()->with("error", $exception->getMessage());
        }

        return redirect()->back()->with("success", "Slider has been deleted successfully.");
    }

}
