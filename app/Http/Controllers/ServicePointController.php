<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePoint;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicePointController extends Controller
{
    //
    public function index()
    {
        // Fetch the service points data from the database
        $servicePoints = ServicePoint::all();

        return view('admin.service_points.index', compact('servicePoints'));
    }
    public function create()
    {
        return view('admin.service_points.create');
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
            $servicePoint = new ServicePoint();
            $servicePoint->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $servicePoint->save();

            return redirect()->route('service.index')->with('success', 'Service point created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to create service point. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function show(ServicePoint $servicePoint): View
    {
        return view('admin.service_points.show', compact('servicePoint'));
    }
    public function edit(ServicePoint $servicePoint)
    {
        return view('admin.service_points.edit', compact('servicePoint'));
    }

    public function update(Request $request, ServicePoint $servicePoint): RedirectResponse
    {
        // Form Validation
        $request->validate([
            "title" => "required|string|max:255",
            "subtitle" => "required|string|max:255",
            "description" => "required|string",
        ]);

        try {
            $servicePoint->fill([
                "title" => $request->input("title"),
                "subtitle" => $request->input("subtitle"),
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);
            $servicePoint->save();

            return redirect()->route('service.index')->with('success', 'Service point updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update service point. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    public function destroy(ServicePoint $servicePoint): RedirectResponse
    {
        try {
            $servicePoint->delete();
            return redirect()->route('service.index')->with('success', 'Service point deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to delete service point. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
