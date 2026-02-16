<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\Heritage;

class FrontPageController extends Controller
{

    public function index(string $url_code)
    {
        if (in_array($url_code, ['ktm-23-kumari-che', 'ktm-23-kumari-che-np'])) {
            return redirect(to: '/page/ktm23kumarinp');
        }
        return "hello";
    }
    public function about()
    {
        return view('pages.about');
    }

    public function page(string $url_code)
    {
        if (in_array($url_code, ['ktm-23-kumari-che', 'ktm-23-kumari-che-np'])) {
            return redirect(to: '/page/ktm23kumarius');
        }

        $languages = Heritage::getLanguagesBySite($url_code);

        $heritage = Heritage::with(['heritage_details', 'lang'])
            ->whereUrlCode($url_code)->first();

        $galleries = Gallery::whereSiteId($heritage->site_id)->get();

        return view('pages.page', compact(['heritage', 'languages', 'galleries']));
    }
}

