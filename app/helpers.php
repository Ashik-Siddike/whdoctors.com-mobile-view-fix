<?php

use App\Models\FlybdCategories;
use App\Models\AbroadLivingCategory;
use App\Models\PageContent;
use App\Models\Address;
use App\Models\Category;
use App\Models\SubPage;
use App\Models\User;
use App\Models\ConferenceCategories;

// use App\Models\UserActivity;
// // use App\Category;
// use App\User;
// use Illuminate\Support\Facades\Auth;
// use Carbon\Carbon;
// use DB;


function getContentData($id, $value) {
    $content = PageContent::where('id', $id)->first();
    return $content ? $content->$value : null;
}


// function getContentData($id, $value) {
//     return PageContent::where('id', $id)->first()->$value;
// }
function getAddressData($id, $value) {
    $address = Address::where('id', $id)->first();
    return $address ? $address->$value : null; // যদি রেকর্ড না থাকে, তাহলে null ফেরত দেবে
}
function getUsersData($id, $value) {
    return User::where('id', $id)->first()->$value;
}
function getCategoriesData() {
    return Category::select('title', 'slug', 'id')->get();
}
function getConferenceCategoriesData() {
    return ConferenceCategories::select('title', 'slug', 'id')->get();
}

function getflybdCategoriesData() {
    return FlybdCategories::select('title', 'slug', 'id')->get();
}



function getabroadCategoriesData() {
    return AbroadLivingCategory::select('title', 'slug', 'id')->get();
}
function getTopNavData($value) {
    $address = Address::where('is_show_on_navbar', 1)->first();
    return $address ? $address->$value : null;
}

function hasSubPage($page_id){
    return SubPage::where('page_id', $page_id)->exists();
}

function getSubPageData($page_id){
    return SubPage::where('page_id', $page_id)->get()->all();
}


// function createUserActivity($request, $action, $description, $log_level, $email)
// {
//     $userActivity = new UserActivity();
//     $userActivity->action = $action;
//     $userActivity->email = $email ?? auth()->user()->name . '<' . auth()->user()->email . '>';
//     $userActivity->description = $description;
//     $userActivity->log_level = $log_level;
//     $userActivity->ip = $request->ip();
//     $userActivity->browser = $request->header('User-Agent');
//     $userActivity->save();
// }

// // last login helpers create
// function lastLoginUser()
// {
//     $date = Auth::user()->last_login;
//     $jplast_login = Carbon::parse($date)->format('Y/m/d H:i');
//     return $jplast_login;
// }

// function isChecked($optionId, $itemArray = array())
// {
//     $checked = false;
//     if (!empty($itemArray) && isset($optionId)) {
//         if (in_array($optionId, $itemArray)) {
//             $checked = true;
//         }
//     }
//     return $checked;
// }

// /**
//  * Unauthorized User
//  */

// function unauthorizedAccess($id)
// {
//     if (Auth::user()->id != $id) {
//         return true;
//     }
// }
