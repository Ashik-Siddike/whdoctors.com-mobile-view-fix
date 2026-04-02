<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewBlogNotification;

class BlogController extends Controller
{
    function __construct(){
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blog-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blog = Blog::get()->all();
            return DataTables::of($blog)
                ->addIndexColumn()
                ->addColumn('category', function($row) {
                    return $row->category->title;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.blogs.index', ['blogs' => Blog::all()]);
    }

    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => BlogCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = $request->all();

        if ($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/blog/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        $blog = Blog::create($data);

        // ✅ ইমেইল পাঠানো হচ্ছে সব সাবস্ক্রাইবারকে
        $subscribers = Subscriber::pluck('email');
        foreach ($subscribers as $email) {
            Mail::to($email)->send(new NewBlogNotification($blog));
        }

        return redirect()->route('blogs')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        return view('admin.blogs.edit', [
            'blog' => Blog::find($id),
            'categories' => BlogCategory::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = $request->all();
        $old_data = Blog::find($id);

        if ($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/blog/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if ($old_data->image != "" && file_exists($old_data->image)) {
                unlink($old_data->image);
            }
        }

        Blog::find($id)->update($data);

        return redirect()->route('blogs')->with('success', 'Blog updated successfully.');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if ($blog->image != "" && file_exists($blog->image)) {
            unlink($blog->image);
        }
        $blog->delete();
        return redirect()->route('blogs')->with('success', 'Blog deleted successfully.');
    }
}
