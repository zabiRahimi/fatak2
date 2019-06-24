<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pro;
use App\Models\Essay;
class SearchController extends Controller
{
  public function search(Request $request)
     {

     		 $record_pro =Pro::search($request->search_matn)->get();
         $record_ess=Essay::search($request->search_matn)->get();
         $count_record_pro= count($record_pro);
         $count_record_ess=count($record_ess);

         return view('search', compact('record_pro' , 'count_record_pro' , 'record_ess' , 'count_record_ess' ));
     }

// public function search(Request $request)
// {
//     // First we define the error message we are going to show if no keywords
//     // existed or if no results found.
//     $error = ['error' => 'هیچ رکوردی یافت نشد'];
//
//     // Making sure the user entered a keyword.
//     if($request->has('q')) {
//
//         // Using the Laravel Scout syntax to search the products table.
//         $posts = Pro::search($request->get('q'))->get();
//
//         // If there are results return them, if none, return the error message.
//         return $posts->count() ? $posts : $error;
//
//     }
//
//     // Return the error message if no keywords existed
//     return $error;
// }
}
