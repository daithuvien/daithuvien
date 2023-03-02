<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Course;

class HomeController extends Controller
{
    public function index() 
    {
        $footerText = "Đại Thư Viện";
        $footerYear = '2021';

        ######### SEO ##############################################################
        SEOMeta::setTitle('Đại Thư Viện - Thư Viện Tổng Hợp');
        SEOMeta::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download.');
        SEOMeta::setCanonical('https://daithuvien.com/');

        OpenGraph::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download');
        OpenGraph::setTitle('Đại Thư Viện - Thư Viện Tổng Hợp');        
        OpenGraph::setUrl('https://daithuvien.com/');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'Đại Thư Viện - Thư Viện Tổng Hợp');
        OpenGraph::addProperty('image', 'https://daithuvien.com/client/imgs/logo.png');

        JsonLd::setTitle('Đại Thư Viện - Thư Viện Tổng Hợp');
        JsonLd::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download');
        JsonLd::addImage('https://daithuvien.com/client/imgs/logo.png');
        ################### END SEO #################################################

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

    function changeLocale($locate) {
        $lang = $locate;
        Session::put('language', $lang);
        return redirect()->back();
    }

    public function privacy() {
        return view('client.privacy');
    }

    public function terms() {
        return view('client.terms');
    }

    public function howToDelete() {
        return view('client.howtodelete');
    }
    
    public function decrypt() {
        return view('client.decrypt')
    }
}
