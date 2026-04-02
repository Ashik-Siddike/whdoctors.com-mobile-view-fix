<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Service;
use App\Models\University;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\File;

use App\Models\Slider;
use Illuminate\Http\Request;
use DataTables;

class DashboardController extends Controller
{
    public function index(){
        $total_services = Service::count();
        $total_users = User::count();
        $total_courses = Course::count();
        $total_universities = University::count();
        $total_blogs = Blog::count();
        return view('admin.home.index',[
            'total_services' => $total_services,
            'total_users' => $total_users,
            'total_courses' => $total_courses,
            'total_universities' => $total_universities,
            'total_blogs' => $total_blogs,
        ]);
    }
    public function storageLink()
    {
        try {
            if (File::exists(public_path('storage'))) {
                File::delete(public_path('storage'));
            }

            Artisan::call('storage:link');

            return redirect()->route('slider.index')->with('success', 'Storage linked successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '<span style="color:red;">['.get_class($e).']</span> '.$e->getMessage());
        }
    }





}
