<?php

namespace App\Http\Controllers;
use App\Mail\AppointmentNotification;


use App\Mail\NewBlogNotification;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\Flybd;
use App\Models\FlybdCategories;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\User;
use App;
use App\Models\AboutNav;
use App\Models\ClientReview;
use App\Models\Countries;
use App\Models\SubPage;
use App\Models\University;
use App\Models\AbroadLiving;
use App\Models\AbroadLivingCategory;
use GuzzleHttp\Client;
use PHPUnit\Framework\Constraint\Count;
use App\Models\Conference;
use App\Models\ConferenceCategories;
use App\Models\Slider;
use App\Models\AboutSection;
use App\Models\ServicePoint;
use App\Models\Contentus;
use App\Models\Office;
use App\Models\SeoData;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;



class PageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index','store']]);
         $this->middleware('permission:page-create', ['only' => ['create','store']]);
         $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:page-delete', ['only' => ['delete']]);
    }

    public function langHome() {
        return view('lang');
    }
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();

    }

    public function home()
    {
        $content = PageContent::with('page')->whereIn('page_id', [1, 8])->get();
        $universities = University::where('is_show_homepage', 1)->get();
        $partners = University::where('is_partner', 1)->get();

        // $aboutSections = AboutSection::where('status', 1)->get();

        $aboutSections = AboutSection::where('status', 1)->latest()->get();




        $servicePoints = ServicePoint::query()->where('status', 1)->get();

        $contentus = Contentus::where('status', 1)->latest()->get();

        $offices = Office::where('status', 1)
                        ->latest()
                        ->take(3)
                        ->get();



        $sliders = Slider::query()
            ->where("status", 1)
            ->orderBy("sort")
            ->get();

        $countries = DB::table('countries')
            ->join('universities', 'countries.id', '=', 'universities.country_id')
            ->select('countries.*')
            ->distinct()
            ->get();

        $employees = User::where('is_employee', 1)->get();
        $client_reviews = ClientReview::where('status', 1)->orderBy('id', 'desc')->take(4)->get();


        $blogs = DB::table('blogs')->orderBy('blogs.id', 'desc')->limit(4)->get();

        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.index', compact(
            'content', 'countries', 'blogs', 'universities',
            'partners', 'employees', 'aboutSections', 'client_reviews',
            'sliders','servicePoints','contentus','offices','seo'
        ));
    }


    public function subscriberStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $data = $request->all();



       Subscriber::query()->create($data);



        return redirect()->back()->with('success', 'subscribe created successfully.');

    }

    public function abroadUniversity($country){
        $publicUniversities = DB::table('universities')
            ->join('countries', 'universities.country_id', '=', 'countries.id')
            ->select('universities.*', 'countries.name as country_name')
            ->where('countries.name', $country)
            ->where('universities.type', 'public')
            ->get();

        $privateUniversities = DB::table('universities')
            ->join('countries', 'universities.country_id', '=', 'countries.id')
            ->select('universities.*', 'countries.name as country_name')
            ->where('countries.name', $country)
            ->where('universities.type', 'private')
            ->get();

        $universities = DB::table('universities')
            ->join('countries', 'universities.country_id', '=', 'countries.id')
            ->select('universities.*', 'countries.name as country_name')
            ->where('countries.name', $country)
            ->get();

        $country = DB::table('countries')
            ->where('name', $country)
            ->first();

        $courses = Course::get()->all();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();


        return view('frontend.abroad-university', [
            'publicUniversities' => $publicUniversities,
            'privateUniversities' => $privateUniversities,
            'universities' => $universities,
            'country' => $country,
            'courses' => $courses,
            'seo' => $seo

        ]);
    }

    public function studyAbroadUniversity($university){
        $university = DB::table('universities')
            ->where('name', $university)
            ->first();
        $country = Countries::where('id', $university->country_id)->get('name')->first();
        $universities = University::where('country_id', $university->country_id)->get();

        $courses = DB::table('university_course')
            ->join('courses', 'university_course.course_id', '=', 'courses.id')
            ->select('courses.*')
            ->where('university_course.university_id', $university->id)
            ->get();
            $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();


        return view('frontend.study-abroad-university', [
            'university' => $university,
            'universities' => $universities,
            'country' => $country,
            'courses' => $courses,
            'seo' => $seo
        ]);
    }



    public function about()
    {
        $content = PageContent::all();
        $users = User::where('is_employee', 1)->whereHas('roles', function ($query) {
            return $query->where('name','!=', 'superadmin');
        })->get()->all();
        $universities = University::take(10)->get();
        $aboutNab = AboutNav::where('status', 1)->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.about-us',
        [
            'content' => $content,
            'users' => $users,
            'universities' => $universities,
            'aboutNab' => $aboutNab,
            'seo' => $seo
        ]);
    }


    public function service(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $services = Service::where('category_id', $category->id)->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.service',
        [
            'services' => $services,
            'category' => $category,
            'seo' => $seo
        ]);
    }
    public function conferenc(Request $request, $slug)
    {
        $conferenceCategories = ConferenceCategories::where('slug', $slug)->first();
        $conferences = Conference::where('conference_category_id', $conferenceCategories->id)->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.conferences',
        [
            'conferences' => $conferences,
            'conferenceCategories' => $conferenceCategories,
            'seo' => $seo
        ]);
    }


    public function flybd(Request $request, $slug)
    {
        $flybdcategory = FlybdCategories::where('slug', $slug)->first();
        $flybds = Flybd::where('flybd_category_id', $flybdcategory->id)->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.flybds',
        [
            'flybds' => $flybds,
            'flybdcategory' => $flybdcategory,
            'seo' => $seo
        ]);
    }

    public function abroads(Request $request, $slug)
    {
        $abroadLivingCategory = AbroadLivingCategory::where('slug', $slug)->first();
        $abroadLiving = AbroadLiving::where('abroad_category_id', $abroadLivingCategory->id)->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.abroad',
        [
            'abroadLiving' => $abroadLiving,
            'abroadLivingCategory' => $abroadLivingCategory,
            'seo' => $seo
        ]);
    }
    public function blog()
    {

        $blogs = DB::table('blogs')->orderBy('blogs.id', 'desc')->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.blog',['blogs'=>$blogs, 'seo' => $seo]);
    }

    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        $latestBlogs = Blog::orderBy('blogs.id', 'desc')->limit(4)->get();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.blog-details',['blog'=>$blog, 'latestBlogs' => $latestBlogs, 'seo' => $seo]);
    }

    // public function login()
    // {
    //     return view('frontend.login');
    // }

    // public function service_team()
    // {
    //     $content = PageContent::all();
    //     return view('frontend.service_team', ['content' => $content]);
    // }

    public function conference()
    {
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.conference', ['seo' => $seo]);
    }
    public function fly_bd()
    {
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.fly_bd', ['seo' => $seo]);
    }
    // public function abroad_living()
    // {
    //     return view('frontend.abroad_living');
    // }

    public function abroad()
    {
        $countries = DB::table('countries')
            ->join('universities', 'countries.id', '=', 'universities.country_id')
            ->select('countries.*')
            ->distinct()
            ->get();
            $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.study-abroad',[
            'countries' => $countries,
            'seo' => $seo

        ]);
    }

    public function abroadLiving(){
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.abroad-living', ['seo' => $seo]);
    }





    public function abroadStudyDetails($slug){
        $content = SubPage::where('slug', $slug)->first();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.subpage', ['content' => $content, 'seo' => $seo]);
    }

    public function conferenceDetails($slug){
        $content = SubPage::where('slug', $slug)->first();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.subpage', ['content' => $content, 'seo' => $seo]);
    }

    public function flyBdDetails($slug){
        $content = SubPage::where('slug', $slug)->first();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.subpage', ['content' => $content, 'seo' => $seo]);
    }

    public function abroadLivingDetails($slug){
        $content = SubPage::where('slug', $slug)->first();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.subpage', ['content' => $content, 'seo' => $seo]);
    }
    public function subPage($slug){
        $content = SubPage::where('slug', $slug)->first();
        $currentRoute = Route::currentRouteName(); // should be 'home'
        $seo = SeoData::where('route_name', $currentRoute)->first();

        return view('frontend.subpage', ['content' => $content, 'seo' => $seo]);
    }



    public function index(Request $request){
        if ($request->ajax()) {
            $pages = Page::get()->all();
            return DataTables::of($pages)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.pages.index',['pages'=>Page::all()]);
    }


    public function create(){
        return view('admin.pages.create');
    }


    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:100|unique:pages',
        ], [
            'title.max' => 'your title should be less than 100 characters',
            'title.unique' => 'this title is already taken',
        ]);
        $data = $request->all();

        Page::create($data);
        return redirect()->route('pages')->with('success','Page created successfully');
    }


    public function edit($id){
        return view('admin.pages.edit',['page'=>Page::find($id)]);
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|max:100|unique:pages,title,'.$id,
        ], [
            'title.max' => 'your title should be less than 100 characters',
            'title.unique' => 'this title is already taken',
        ]);
        $data = $request->all();

        Page::find($id)->update($data);
        return redirect()->route('pages')->with('success','Page updated successfully');
    }

    public function delete($id){
        Page::find($id)->delete();
        return back()->with('success','Page deleted successfully');
    }



    public function appointmentIndex()
    {

        return view('frontend.appointment');
    }



    public function appointmentStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'visit_time' => 'required|date',
            'purpose' => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::create($validated);

        try {
            Mail::to([
//               'harun.sh96@gmail.com',
//                'asifrafiun@gmail.com'
                'harun.sh96@gmail.com'
            ])->queue(new AppointmentNotification($appointment));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

        return back()->with('success', 'Appointment created successfully.');
    }

}
