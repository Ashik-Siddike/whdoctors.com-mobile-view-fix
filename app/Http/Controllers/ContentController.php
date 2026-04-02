<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contentus;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    //
    public function index()
    {
        // Fetch the content data from the database
        $content = Contentus::all();

        return view('admin.contentus.index', compact('content'));
    }
    public function create()
    {
        return view('admin.contentus.create');
    }
    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
            "subtitle" => "required|string|max:255",
            "description" => "required|string",
        ]);

        try {
            $content = new Contentus();
            $content->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $content->save();

            return redirect()->route('contentus.index')->with('success', 'Content created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to create content. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function show(Contentus $content): View
    {
        return view('admin.contentus.show', compact('content'));
    }
    public function edit(Contentus $content)
    {
        return view('admin.contentus.edit', compact('content'));
    }
    public function update(Request $request, Contentus $content)
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
            "subtitle" => "required|string|max:255",
            "description" => "required|string",
        ]);

        try {
            $content->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $content->save();

            return redirect()->route('contentus.index')->with('success', 'Content updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update content. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function destroy(Contentus $content)
    {
        try {
            $content->delete();
            return redirect()->route('contentus.index')->with('success', 'Content deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to delete content. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
