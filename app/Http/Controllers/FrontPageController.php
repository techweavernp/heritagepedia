<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\Heritage;

class FrontPageController extends Controller
{

    public function index(string $url_code)
    {
        if ($redirect = $this->handleLegacyRedirect($url_code)) {
            return $redirect;
        }
        return "hello";
    }
    public function about()
    {
        return view('pages.about');
    }

    public function page(string $url_code)
    {
        if ($redirect = $this->handleLegacyRedirect($url_code)) {
            return $redirect;
        }

        $languages = Heritage::getLanguagesBySite($url_code);

        $heritage = Heritage::with(['heritage_details', 'lang'])
            ->published()
            ->whereUrlCode($url_code)->first();

        $galleries = Gallery::whereSiteId($heritage->site_id)->get();

        return view('pages.page', compact(['heritage', 'languages', 'galleries']));
    }

    private function handleLegacyRedirect(string $code)
    {
        $redirects = config('heritage_redirects', []);

        if (isset($redirects[$code])) {
            return redirect()->to('/page/' . $redirects[$code], 301);
        }

        return null;
    }
}
