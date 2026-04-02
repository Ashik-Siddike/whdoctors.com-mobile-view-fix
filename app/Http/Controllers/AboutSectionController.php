<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Exception;

class AboutSectionController extends Controller
{
    //

    public function index()
    {
        // Fetch the about section data from the database
        $aboutSection = AboutSection::all();

        return view('admin.about.index', compact('aboutSection'));
    }
    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
            "subtitle" => "required|string|max:255",
            "description" => "required|string",
        ]);

        try {
            $aboutSection = new AboutSection();
            $aboutSection->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $aboutSection->save();

            return redirect()->route('about.index')->with('success', 'About section created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to create about section. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }


    public function show(AboutSection $aboutSection): View
    {
        return view('admin.about.show', compact('aboutSection'));
    }

    public function edit(AboutSection $aboutSection): View
    {
        return view('admin.about.edit', compact('aboutSection'));
    }
    public function update(Request $request, AboutSection $aboutSection): RedirectResponse
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
            "subtitle" => "required|string|max:255",
            "description" => "required|string",
        ]);

        try {
            $aboutSection->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $aboutSection->save();

            return redirect()->route('about.index')->with('success', 'About section updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update about section. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function destroy(AboutSection $aboutSection): RedirectResponse
    {
        try {
            $aboutSection->delete();
            return redirect()->route('about.index')->with('success', 'About section deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to delete about section. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

}
