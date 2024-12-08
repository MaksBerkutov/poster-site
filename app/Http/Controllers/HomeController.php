<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
        $movies = Movie::where('is_published', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('welcome',compact('movies'));
    }
    public function setLocale(Request $request){
        $locale = $request->input('locale', 'en');
        if (in_array($locale, ['en', 'uk'])) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        }
        return redirect()->back();
    }
}
