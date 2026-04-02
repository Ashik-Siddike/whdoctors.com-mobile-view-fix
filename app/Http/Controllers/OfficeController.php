<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePoint;
use App\Models\Office;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfficeController extends Controller
{
    //

    public function index()
    {
        // Fetch the office data from the database
        $offices = Office::all();

        return view('admin.offices.index', compact('offices'));
    }
    public function create()
    {
        return view('admin.offices.create');
    }
    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
        ]);

        try {
            $office = new Office();
            $office->fill([
                "title" => $request->input("title"),
                "address" => $request->input("address"),
                "phone" => $request->input("phone"),
                "email" => $request->input("email"),
                "working_hour" => $request->input("working_hour"),
                "status" => $request->input("status"),
            ]);
            $office->save();

            return redirect()->route('Office.index')->with('success', 'Office created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to create office. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function show(Office $office)
    {
        return view('admin.offices.show', compact('office'));
    }
    public function edit(Office $office)
    {
        return view('admin.offices.edit', compact('office'));
    }
    public function update(Request $request, Office $office)
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
        ]);

        try {
            $office->fill([
                "title" => $request->input("title"),
                "address" => $request->input("address"),
                "phone" => $request->input("phone"),
                "email" => $request->input("email"),
                "working_hour" => $request->input("working_hour"),
                "status" => $request->input("status"),
            ]);
            $office->save();

            return redirect()->route('Office.index')->with('success', 'Office updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update office. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function destroy(Office $office)
    {
        try {
            $office->delete();
            return redirect()->route('Office.index')->with('success', 'Office deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to delete office. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
