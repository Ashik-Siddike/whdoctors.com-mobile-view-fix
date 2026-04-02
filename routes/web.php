<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AppointmentContrller;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlybdCategoryController;
use App\Http\Controllers\FlybdController;
use App\Http\Controllers\AbroadCategoryController;
use App\Http\Controllers\AbroadController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\cashTransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubPageController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConferenceCategoriesController;
use App\Http\Controllers\Conference;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\AboutNavController;
use App\Http\Controllers\ServicePointController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\SeoDataController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Amount;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    // Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
    //     ->middleware('guest')
    //     ->name('admin.login');

Route::get('lang/home', [PageController::class, 'langHome']);
Route::get('lang/change', [PageController::class, 'change'])->name('changeLang');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/subscribe', [PageController::class, 'subscriberStore'])->name('subscribe');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service/{slug}', [PageController::class, 'service'])->name('service');
Route::get('/conference/{slug}', [PageController::class, 'conferenc'])->name('conferenc');
Route::get('/flybd/{slug}', [PageController::class, 'flybd'])->name('flybd');
Route::get('/abroads/{slug}', [PageController::class, 'abroads'])->name('abroads.font');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/details/{id}', [PageController::class, 'blogDetails'])->name('blog.details');

Route::get('/abroad-university/{country}', [PageController::class, 'abroadUniversity'])->name('abroad.university');
Route::get('/study-abroad-university/{university}', [PageController::class, 'studyAbroadUniversity'])->name('study.abroad.university');
Route::get('/abroad', [PageController::class, 'abroad'])->name('abroad');


Route::get('/abroad-living', [PageController::class, 'abroadLiving'])->name('abroad-living');
Route::get('/subPage/{slug}', [PageController::class, 'subPage'])->name('subPage');



Route::get('/conference', [PageController::class, 'conference'])->name('conference');
// Route::get('/flybd', [PageController::class, 'fly_bd'])->name('flybd');

Route::post('/apply/store', [ApplyController::class,'apply'])->name('apply.store.university');

// message send route
Route::post('/message/store', [ContactFormController::class,'store'])->name('message.store');



Route::middleware('auth')->group(function () {

    Route::get('appointments', [AppointmentContrller::class, 'index'])->name('appointments.index');
    Route::get('appointments/{appointment}', [AppointmentContrller::class, 'show'])->name('appointments.show');
    Route::delete('appointments/{appointment}', [AppointmentContrller::class, 'destroy'])->name('appointments.destroy');

    //  Route::resource('seo-data', SeoDataController::class);

       // Service Category Route
    Route::get('/seo-data', [SeoDataController::class,'index'])->name('seo-data.index');
    Route::get('/seo-data/create', [SeoDataController::class,'create'])->name('seo-data.create');
    Route::post('/seo-data/store', [SeoDataController::class,'store'])->name('seo-data.store');
    Route::get('/seo-data/edit/{id}', [SeoDataController::class,'edit'])->name('seo-data.edit');
    Route::post('/seo-data/update/{id}', [SeoDataController::class, 'update'])->name('seo-data.update');

    Route::get('/seo-data/delete/{id}', [SeoDataController::class,'delete'])->name('seo-data.destroy');



    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Panel Route
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('cache-clear', function () {
        Artisan::call('optimize:clear');
        request()->session()->flash('success', 'Successfully cache cleared.');
        return redirect()->back();
    })->name('cache.clear');

    Route::get('storage-link', [DashboardController::class, 'storageLink'])->name('storage.link');

    // Ck editor routes
    Route::get('ckeditor', [CkeditorController::class, 'index']);
    Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

    // Service Category Route
    Route::get('/dashboard/categories', [CategoryController::class,'index'])->name('categories');
    Route::get('/dashboard/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/dashboard/category/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/dashboard/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/dashboard/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/dashboard/category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');



    //message Route
    Route::get('/dashboard/message', [ContactFormController::class,'index'])->name('message');
    Route::get('/dashboard/message/read/', [ContactFormController::class,'read'])->name('message.read');
    Route::get('/dashboard/message/important/', [ContactFormController::class,'important'])->name('message.important');
    Route::get('/dashboard/message/delete/{id}', [ContactFormController::class,'delete'])->name('message.delete');


    // Service Route
    Route::get('/dashboard/services', [ServiceController::class,'index'])->name('services');
    Route::get('/dashboard/service/create', [ServiceController::class,'create'])->name('service.create');
    Route::post('/dashboard/service/store', [ServiceController::class,'store'])->name('service.store');
    Route::get('/dashboard/service/edit/{id}', [ServiceController::class,'edit'])->name('service.edit');
    Route::post('/dashboard/service/update/{id}', [ServiceController::class,'update'])->name('service.update');
    Route::get('/dashboard/service/delete/{id}', [ServiceController::class,'delete'])->name('service.delete');


    // BLog Category Route
    Route::get('/dashboard/blog/categories', [BlogCategoryController::class,'index'])->name('blog.categories');
    Route::get('/dashboard/blog/category/create', [BlogCategoryController::class,'create'])->name('blog.category.create');
    Route::post('/dashboard/blog/category/store', [BlogCategoryController::class,'store'])->name('blog.category.store');
    Route::get('/dashboard/blog/category/edit/{id}', [BlogCategoryController::class,'edit'])->name('blog.category.edit');
    Route::post('/dashboard/blog/category/update/{id}', [BlogCategoryController::class,'update'])->name('blog.category.update');
    Route::get('/dashboard/blog/category/delete/{id}', [BlogCategoryController::class,'delete'])->name('blog.category.delete');

    Route::get('/dashboard/subscribe',[SubscriberController::class,'index'])->name('subscriber.index');
//    Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
    Route::get('/dashboard/subscribe/delete/{id}', [SubscriberController::class,'delete'])->name('subscribe.delete');

    // BLog Route
    Route::get('/dashboard/blogs', [BlogController::class,'index'])->name('blogs');
    Route::get('/dashboard/blog/create', [BlogController::class,'create'])->name('blog.create');
    Route::post('/dashboard/blog/store', [BlogController::class,'store'])->name('blog.store');
    Route::get('/dashboard/blog/edit/{id}', [BlogController::class,'edit'])->name('blog.edit');
    Route::post('/dashboard/blog/update/{id}', [BlogController::class,'update'])->name('blog.update');
    Route::get('/dashboard/blog/delete/{id}', [BlogController::class,'delete'])->name('blog.delete');


    //ConferenceCategories
    Route::get('/dashboard/conference/categories', [ConferenceCategoriesController::class,'index'])->name('conference.categories');
    Route::get('/dashboard/conference/category/create', [ConferenceCategoriesController::class,'create'])->name('conference.category.create');
    Route::post('/dashboard/conference/category/store', [ConferenceCategoriesController::class,'store'])->name('conference.category.store');
    Route::get('/dashboard/conference/category/edit/{id}', [ConferenceCategoriesController::class,'edit'])->name('conference.category.edit');
    Route::post('/flybds/conference/update/{id}', [ConferenceCategoriesController::class, 'update'])->name('conference.category.update');
    Route::get('/dashboard/conference/category/delete/{id}', [ConferenceCategoriesController::class,'delete'])->name('conference.category.delete');


    //ConferenceController Route
    Route::get('/dashboard/conferences', [ConferenceController::class,'index'])->name('conferences');
    Route::get('/dashboard/conferences/create', [ConferenceController::class,'create'])->name('conferences.create');
    Route::post('/dashboard/conferences/store', [ConferenceController::class,'store'])->name('conferences.store');
    Route::get('/dashboard/conferences/edit/{id}', [ConferenceController::class,'edit'])->name('conferences.edit');
    Route::post('/dashboard/conferences/update/{id}', [ConferenceController::class,'update'])->name('conferences.update');
    Route::get('/dashboard/conferences/delete/{id}', [ConferenceController::class,'delete'])->name('conferences.delete');




    //Flybd Category
    Route::get('/dashboard/flybds/categories', [FlybdCategoryController::class,'index'])->name('flybds.categories');
    Route::get('/dashboard/flybds/category/create', [FlybdCategoryController::class,'create'])->name('flybds.category.create');
    Route::post('/dashboard/flybds/category/store', [FlybdCategoryController::class,'store'])->name('flybds.category.store');
    Route::get('/dashboard/flybds/category/edit/{id}', [FlybdCategoryController::class,'edit'])->name('flybds.category.edit');
    Route::post('/flybds/category/update/{id}', [FlybdCategoryController::class, 'update'])->name('flybds.category.update');
    Route::get('/dashboard/flybds/category/delete/{id}', [FlybdCategoryController::class,'delete'])->name('flybds.category.delete');


    //Flybd Route
    Route::get('/dashboard/flybds', [FlybdController::class,'index'])->name('flybds');
    Route::get('/dashboard/flybds/create', [FlybdController::class,'create'])->name('flybds.create');
    Route::post('/dashboard/flybds/store', [FlybdController::class,'store'])->name('flybds.store');
    Route::get('/dashboard/flybds/edit/{id}', [FlybdController::class,'edit'])->name('flybds.edit');
    Route::post('/dashboard/flybds/update/{id}', [FlybdController::class,'update'])->name('flybds.update');
    Route::get('/dashboard/flybds/delete/{id}', [FlybdController::class,'delete'])->name('flybds.delete');



    // AbroadCategory

    Route::get('/dashboard/abroads/categories', [AbroadCategoryController::class,'index'])->name('abroad.categories');
    Route::get('/dashboard/abroads/category/create', [AbroadCategoryController::class,'create'])->name('abroad.category.create');
    Route::post('/dashboard/abroads/category/store', [AbroadCategoryController::class,'store'])->name('abroad.category.store');
    Route::get('/dashboard/abroads/category/edit/{id}', [AbroadCategoryController::class,'edit'])->name('abroad.category.edit');
    Route::post('/abroads/category/update/{id}', [AbroadCategoryController::class, 'update'])->name('abroad.category.update');
    Route::get('/abroads/category/delete/{id}', [AbroadCategoryController::class, 'delete'])->name('abroad.category.delete');



     // Abroad


     Route::get('/dashboard/abroads', [AbroadController::class,'index'])->name('abroad.index');
     Route::get('/dashboard/abroads/create', [AbroadController::class,'create'])->name('abroad.create');
     Route::post('/dashboard/abroads/store', [AbroadController::class,'store'])->name('abroad.store');
     Route::get('/dashboard/abroads/edit/{id}', [AbroadController::class,'edit'])->name('abroad.edit');
     Route::post('/dashboard/abroads/update/{id}', [AbroadController::class,'update'])->name('abroad.update');
     Route::get('/dashboard/abroads/delete/{id}', [AbroadController::class,'delete'])->name('abroad.delete');



    // Pages Route
    Route::get('/dashboard/pages', [PageController::class,'index'])->name('pages');
    Route::get('/dashboard/page/create', [PageController::class,'create'])->name('page.create');
    Route::post('/dashboard/page/store', [PageController::class,'store'])->name('page.store');
    Route::get('/dashboard/page/edit/{id}', [PageController::class,'edit'])->name('page.edit');
    Route::post('/dashboard/page/update/{id}', [PageController::class,'update'])->name('page.update');
    Route::get('/dashboard/page/delete/{id}', [PageController::class,'delete'])->name('page.delete');

    // subpage Route
    Route::get('/dashboard/subpage', [SubPageController::class,'index'])->name('subpage');
    Route::get('/dashboard/subpage/create', [SubpageController::class,'create'])->name('subpage.create');
    Route::post('/dashboard/subpage/store', [SubpageController::class,'store'])->name('subpage.store');
    Route::get('/dashboard/subpage/edit/{id}', [SubpageController::class,'edit'])->name('subpage.edit');
    Route::post('/dashboard/subpage/update/{id}', [SubpageController::class,'update'])->name('subpage.update');
    Route::get('/dashboard/subpage/delete/{id}', [SubpageController::class,'delete'])->name('subpage.delete');



    // Course Route
    Route::get('/dashboard/course', [CourseController::class,'index'])->name('course');
    Route::get('/dashboard/course/create', [CourseController::class,'create'])->name('course.create');
    Route::post('/dashboard/course/store', [CourseController::class,'store'])->name('course.store');
    Route::get('/dashboard/course/edit/{id}', [CourseController::class,'edit'])->name('course.edit');
    Route::post('/dashboard/course/update/{id}', [CourseController::class,'update'])->name('course.update');
    Route::get('/dashboard/course/delete/{id}', [CourseController::class,'delete'])->name('course.delete');

    // User Route
    Route::get('/dashboard/users', [UserController::class,'index'])->name('users');
    Route::get('/dashboard/users/change/status', [UserController::class,'changeStatus'])->name('users.change.status');
    Route::get('/dashboard/users/show/home', [UserController::class,'change_show_home'])->name('users.change.show.home');
    Route::get('/dashboard/user/create', [UserController::class,'create'])->name('user.create');
    Route::post('/dashboard/user/store', [UserController::class,'store'])->name('user.store');
    Route::get('/dashboard/user/edit/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('/dashboard/user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('/dashboard/user/delete/{id}', [UserController::class,'delete'])->name('user.delete');


    // client-review Route
    Route::get('/dashboard/client-review', [ClientReviewController::class,'index'])->name('client-review');
    Route::get('/dashboard/client-review/change/status', [ClientReviewController::class,'changeStatus'])->name('client-review.change.status');
    Route::get('/dashboard/client-review/create', [ClientReviewController::class,'create'])->name('client-review.create');
    Route::post('/dashboard/client-review/store', [ClientReviewController::class,'store'])->name('client-review.store');
    Route::get('/dashboard/client-review/edit/{id}', [ClientReviewController::class,'edit'])->name('client-review.edit');
    Route::post('/dashboard/client-review/update/{id}', [ClientReviewController::class,'update'])->name('client-review.update');
    Route::get('/dashboard/client-review/delete/{id}', [ClientReviewController::class,'delete'])->name('client-review.delete');


    // agent Route
    Route::get('/dashboard/agent', [AgentController::class,'index'])->name('agent');
    Route::get('/dashboard/agent/create', [AgentController::class,'create'])->name('agent.create');
    Route::post('/dashboard/agent/store', [AgentController::class,'store'])->name('agent.store');
    Route::get('/dashboard/agent/edit/{id}', [AgentController::class,'edit'])->name('agent.edit');
    Route::post('/dashboard/agent/update/{id}', [AgentController::class,'update'])->name('agent.update');
    Route::get('/dashboard/agent/delete/{id}', [AgentController::class,'delete'])->name('agent.delete');


    // employee Route
    Route::get('/dashboard/employee', [UserController::class,'employee'])->name('employee');
    Route::get('/dashboard/employee/create', [UserController::class,'employeeCreate'])->name('employee.create');
    Route::post('/dashboard/employee/store', [UserController::class,'employeeStore'])->name('employee.store');
    Route::get('/dashboard/employee/edit/{id}', [UserController::class,'employeeEdit'])->name('employee.edit');
    Route::post('/dashboard/employee/update/{id}', [UserController::class,'employeeUpdate'])->name('employee.update');
    Route::get('/dashboard/employee/delete/{id}', [UserController::class,'employeeDelete'])->name('employee.delete');





    // Address Route
    Route::get('/dashboard/address', [AddressController::class,'index'])->name('address');
    Route::get('/dashboard/address/create', [AddressController::class,'create'])->name('address.create');
    Route::post('/dashboard/address/store', [AddressController::class,'store'])->name('address.store');
    Route::get('/dashboard/address/edit/{id}', [AddressController::class,'edit'])->name('address.edit');
    Route::post('/dashboard/address/update/{id}', [AddressController::class,'update'])->name('address.update');
    Route::get('/dashboard/address/delete/{id}', [AddressController::class,'delete'])->name('address.delete');

    // Univerrsity Route
    Route::get('/dashboard/university', [UniversityController::class,'index'])->name('university');
    Route::get('/dashboard/university/create', [UniversityController::class,'create'])->name('university.create');
    Route::post('/dashboard/university/store', [UniversityController::class,'store'])->name('university.store');
    Route::get('/dashboard/university/edit/{id}', [UniversityController::class,'edit'])->name('university.edit');
    Route::post('/dashboard/university/update/{id}', [UniversityController::class,'update'])->name('university.update');
    Route::get('/dashboard/university/delete/{id}', [UniversityController::class,'delete'])->name('university.delete');

    // Route::resource("sliders", SliderController::class);
    Route::get('/dashboard/slider', [SliderController::class,'index'])->name('slider.index');
    Route::get('/dashboard/slider/create', [SliderController::class,'create'])->name('slider.create');
    Route::post('/dashboard/slider/store', [SliderController::class,'store'])->name('slider.store');
    Route::get('/dashboard/slider/edit/{slider}', [SliderController::class,'edit'])->name('slider.edit');
    ROute::get('/dashboard/slifrt/show/{slider}', [SliderController::class,'show'])->name('slider.show');
    Route::put('/dashboard/slider/update/{slider}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/dashboard/slider/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');

    //AboutSectionController
    Route::get('/dashboard/about',[AboutSectionController::class,'index'])->name('about.index');
    Route::get('/dashboard/about/create',[AboutSectionController::class,'create'])->name('about.create');
    Route::post('/dashboard/about/store',[AboutSectionController::class,'store'])->name('about.store');
    Route::get('/dashboard/about/show/{aboutSection}',[AboutSectionController::class,'show'])->name('about.show');
    Route::get('/dashboard/about/edit/{aboutSection}', [AboutSectionController::class, 'edit'])->name('about.edit');
    Route::put('/dashboard/about/update/{aboutSection}', [AboutSectionController::class, 'update'])->name('about.update');
    Route::delete('/dashboard/about/delete/{aboutSection}',[AboutSectionController::class,'destroy'])->name('about.destroy');



       //AboutNavController
       Route::get('/dashboard/aboutNav',[AboutNavController::class,'index'])->name('aboutNav.index');
       Route::get('/dashboard/aboutNav/create',[AboutNavController::class,'create'])->name('aboutNav.create');
       Route::post('/dashboard/aboutNav/store',[AboutNavController::class,'store'])->name('aboutNav.store');
       Route::get('/dashboard/aboutNav/show/{AboutNav}',[AboutNavController::class,'show'])->name('aboutNav.show');
       Route::get('/dashboard/aboutNav/edit/{aboutNav}', [AboutNavController::class, 'edit'])->name('aboutNav.edit');
       Route::put('/dashboard/aboutNav/update/{aboutNav}', [AboutNavController::class, 'update'])->name('aboutNav.update');
       Route::delete('/dashboard/aboutNav/delete/{aboutNav}',[AboutNavController::class,'destroy'])->name('aboutNav.destroy');


    //ServicePointController
    Route::get('/dashboard/ServicePoint',[ServicePointController::class,'index'])->name('service.index');
    Route::get('/dashboard/ServicePoint/create',[ServicePointController::class,'create'])->name('service.create');
    Route::post('/dashboard/ServicePoint/store',[ServicePointController::class,'store'])->name('service.store');
    Route::get('/dashboard/ServicePoint/show/{servicePoint}',[ServicePointController::class,'show'])->name('service.show');

    Route::get('/dashboard/ServicePoint/edit/{servicePoint}', [ServicePointController::class, 'edit'])->name('services.edit');
    Route::put('/dashboard/ServicePoint/update/{servicePoint}', [ServicePointController::class, 'update'])->name('services.update');


    Route::delete('/dashboard/ServicePoint/delete/{servicePoint}',[ServicePointController::class,'destroy'])->name('service.destroy');

    // ContentController


    Route::get('/dashboard/Contentus',[ContentController::class,'index'])->name('contentus.index');
    Route::get('/dashboard/Contentus/create',[ContentController::class,'create'])->name('contentus.create');
    Route::post('/dashboard/Contentus/store',[ContentController::class,'store'])->name('contentus.store');
    Route::get('/dashboard/Contentus/show/{content}',[ContentController::class,'show'])->name('contentus.show');

    Route::get('/dashboard/Contentus/edit/{content}', [ContentController::class, 'edit'])->name('contentus.edit');
    Route::put('/dashboard/Contentus/update/{content}', [ContentController::class, 'update'])->name('contentus.update');


    Route::delete('/dashboard/Contentus/delete/{content}',[ContentController::class,'destroy'])->name('contentus.destroy');


    //OfficeController
    Route::get('/dashboard/Office',[OfficeController::class,'index'])->name('Office.index');
    Route::get('/dashboard/Office/create',[OfficeController::class,'create'])->name('Office.create');
    Route::post('/dashboard/Office/store',[OfficeController::class,'store'])->name('Office.store');
    Route::get('/dashboard/Office/show/{office}',[OfficeController::class,'show'])->name('Office.show');
    Route::get('/dashboard/Office/edit/{office}', [OfficeController::class, 'edit'])->name('Office.edit');
    Route::put('/dashboard/Office/update/{office}', [OfficeController::class, 'update'])->name('Office.update');
    Route::delete('/dashboard/Office/delete/{office}',[OfficeController::class,'destroy'])->name('Office.destroy');


    // Page Content Route
    Route::get('/dashboard/page-content', [PageContentController::class,'index'])->name('page-contents');
    Route::get('/dashboard/page-content/change/status', [PageContentController::class,'changeStatus'])->name('page-content.change.status');
    Route::get('/dashboard/page-content/create', [PageContentController::class,'create'])->name('page-content.create');
    Route::post('/dashboard/page-content/store', [PageContentController::class,'store'])->name('page-content.store');
    Route::get('/dashboard/page-content/edit/{id}', [PageContentController::class,'edit'])->name('page-content.edit');
    Route::post('/dashboard/page-content/update/{id}', [PageContentController::class,'update'])->name('page-content.update');
    Route::get('/dashboard/page-content/delete/{id}', [PageContentController::class,'delete'])->name('page-content.delete');

    // Applies Route
    Route::get('/dashboard/applies', [ApplyController::class,'index'])->name('applies');
    Route::get('/dashboard/apply/create', [ApplyController::class,'create'])->name('apply.create');
    Route::post('/dashboard/apply/store', [ApplyController::class,'store'])->name('apply.store');
    Route::get('/dashboard/apply/edit/{id}', [ApplyController::class,'edit'])->name('apply.edit');
    Route::post('/dashboard/apply/update/{id}', [ApplyController::class,'update'])->name('apply.update');
    Route::get('/dashboard/apply/delete/{id}', [ApplyController::class,'delete'])->name('apply.delete');

    // Role Route
    Route::get('/dashboard/role', [RoleController::class,'index'])->name('role.index');
    Route::get('/dashboard/role/create', [RoleController::class,'create'])->name('role.create');
    Route::post('/dashboard/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/dashboard/role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::post('/dashboard/role/update/{id}', [RoleController::class,'update'])->name('role.update');
    Route::get('/dashboard/role/delete/{id}', [RoleController::class,'delete'])->name('role.delete');
    Route::get('/dashboard/role/delete/{id}', [RoleController::class,'destroy'])->name('role.delete');

    // Assign Role Route
    Route::get('/dashboard/assign-role', [AssignRoleController::class,'index'])->name('assignrole.index');
    Route::post('/dashboard/assign-role/store', [AssignRoleController::class,'assignRole'])->name('assignrole.store');


    Route::resource('amount', AmountController::class);

    Route::resource('payment', PaymentController::class);
    // web.php
    Route::get('amount/{amount}/payment', [PaymentController::class, 'create'])->name('payments.create');
    Route::get('/payments/{agent?}', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/{id}/received', [PaymentController::class, 'received'])->name('payment.received');
    Route::get('/payment/received/download/{id}', [PaymentController::class, 'downloadReceived'])->name('admin.download.received');


    Route::get('/amount/{id}/dues', function ($id) {
        $amount = App\Models\Amount::with('payments')->findOrFail($id);
        $total = $amount->amount;
        $paid = $amount->payments->sum('paid');
        $dues = $total - $paid;

        return response()->json([
            'total' => $total,
            'paid' => $paid,
            'dues' => $dues
        ]);
    });
    Route::get('/report/agent', [ReportController::class, 'agentWiseReport'])->name('report.agent');
    Route::get('/report/agent/download', [ReportController::class, 'downloadAgentReport'])->name('report.agent.download');



    // Transactions Route

    Route::group(['middleware' => ['role:superadmin|agent', 'permission:transaction-list']], function () {
    Route::get('/dashboard/transactions', [TransactionController::class,'index'])->name('transactions');
    Route::get('/dashboard/transaction/create', [TransactionController::class,'create'])->name('transaction.create');
    Route::post('/dashboard/transaction/store', [TransactionController::class,'store'])->name('transaction.store');
    Route::get('/dashboard/transaction/show/{id}', [TransactionController::class,'show'])->name('transaction.show');
    Route::get('/dashboard/transaction/edit/{id}', [TransactionController::class,'edit'])->name('transaction.edit');
    Route::put('/dashboard/transaction/update/{id}', [TransactionController::class,'update'])->name('transaction.update');
    Route::get('/dashboard/transaction/delete/{id}', [TransactionController::class,'delete'])->name('transaction.delete');

// routes/web.php
//    Route::get('/dashboard/agentTransactions/{id}', [TransactionController::class, 'agentTransactions'])->name('agent.transactions');

Route::get('/dashboard/agentTransactions/{id}', [TransactionController::class, 'agentTransactions'])->name('agent.transactions');

Route::post('/dashboard/agentTransactions/store/{id}', [TransactionController::class, 'storeTransaction'])->name('agent.transaction.store');

    // Route::post('/dashboard/{id}/transactions', [TransactionController::class, 'storeAgentTransaction'])->name('agent.transactions.store');

    Route::get('/dashboard/cashtransaction/report', [CashTransactionController::class, 'report'])->name('cashtransaction.report');
    Route::post('/dashboard/cashtransaction/reportstore', [CashTransactionController::class, 'reportStore'])->name('cashtransaction.report.store');

});

    // Cash Transactions Route
    Route::get('/dashboard/cashtransactions/{id}', [cashTransactionController::class,'index'])->name('cashtransactions');
    Route::get('/dashboard/cashtransaction/create', [cashTransactionController::class,'create'])->name('cashtransaction.create');
    Route::post('/dashboard/cashtransaction/store', [cashTransactionController::class,'store'])->name('cashtransaction.store');
    Route::get('/dashboard/cashtransaction/edit/{id}', [cashTransactionController::class,'edit'])->name('cashtransaction.edit');
    Route::post('/dashboard/cashtransaction/update/{id}', [cashTransactionController::class,'update'])->name('cashtransaction.update');
    Route::get('/dashboard/cashtransaction/delete/{id}', [cashTransactionController::class,'delete'])->name('cashtransaction.delete');


    // Countries Route
    // Route::get('/dashboard/countries', [CountriesController::class,'index'])->name('countries');

});

Route::get('appointment/booking', [PageController::class, 'appointmentIndex'])->name('frontend.appointment');
Route::post('appointment/booking/store', [PageController::class, 'appointmentStore'])->name('frontend.appointmentstore');


require __DIR__.'/auth.php';
