<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class HomeController extends Controller
{
    public function index() 
    {
        $footerText = "Đại Thư Viện";
        $footerYear = '2021';

        $newsArticles = []; //(new News)->listNewsWithPagination(4);
        $listHotCourses = (new Course)->listHotCourses(4);
        $listViewCourses = (new Course)->listViewCourses(4);
        $listMovies = []; //(new Movie)->getMoviesWithPaginate(4);
        $listQuotes = []; //(new Quote)->listQuotesWithPagination(4);
        return view('client.home', compact(['footerText','footerYear','newsArticles', 'listHotCourses', 'listViewCourses','listMovies','listQuotes']));
    }

    public function confirmRegister() {
        return view('auth.confirm-register');
    }
}
