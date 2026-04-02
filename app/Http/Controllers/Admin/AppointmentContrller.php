<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Setting;
use Illuminate\Http\Request;

class AppointmentContrller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission:appointments-list|appointments-create|appointments-edit|appointments-delete')->only('index');
        $this->middleware('permission:appointments-create')->only(['create', 'store']);
        $this->middleware('permission:appointments-edit')->only(['edit', 'update']);
        $this->middleware('permission:appointments-delete')->only('destroy');
    }

    public function index()
    {
        $appointments = Appointment::query()->orderBy('id', 'DESC')->get();
//        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.appointments.index', compact('appointments', ));
    }

    public function show(Appointment $appointment)
    {

//        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.appointments.show', compact('appointment'  ));

    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully');

    }

}
