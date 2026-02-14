<?php

namespace App\Http\Controllers;


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

        $heritage = Heritage::with(['heritage_details', 'lang', 'galleries'])
            ->whereUrlCode($url_code)->first();

        //return $heritage;

        return view('pages.page', compact(['heritage', 'languages']));
    }
}

