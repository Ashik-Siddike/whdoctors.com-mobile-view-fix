<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutNav;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AboutNavController extends Controller
{
    //


    public function index()
    {
        // Fetch the about section data from the database
        $aboutNav = AboutNav::all();

        return view('admin.aboutNav.index', compact('aboutNav'));
    }
    public function create()
    {
        return view('admin.aboutNav.create');
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
            $aboutNav = new AboutNav();
            $aboutNav->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $aboutNav->save();

            return redirect()->route('aboutNav.index')->with('success', 'aboutNav created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to create aaboutNav Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }


    public function show(AboutNav $aboutNav): View
    {
        return view('admin.aboutNav.show', compact('aboutNav'));
    }

    public function edit(AboutNav $aboutNav): View
    {
        return view('admin.aboutNav.edit', compact('aboutNav'));
    }
    public function update(Request $request, AboutNav $aboutNav): RedirectResponse
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
            "subtitle" => "required|string|max:255",
            "description" => "required|string",
        ]);

        try {
            $aboutNav->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $aboutNav->save();

            return redirect()->route('aboutNav.index')->with('success', 'aboutNav updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update aboutNav. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function destroy(AboutNav $aboutNav): RedirectResponse
    {
        try {
            $aboutNav->delete();
            return redirect()->route('aboutNav.index')->with('success', 'aboutNav deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to delete aboutNav. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
