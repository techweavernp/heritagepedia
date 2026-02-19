<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MobileOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the device is mobile or tablet
        if (!$this->isMobileOrTablet($request)) {
            // Option 1: Return a 403 Forbidden response
            abort(403, 'This page is only accessible on mobile devices and tablets.');

            // Option 2: Redirect to a specific page
            // return redirect()->route('desktop-not-allowed');

            // Option 3: Return a custom view
            // return response()->view('errors.desktop-not-allowed', [], 403);
        }

        return $next($request);
    }

    /**
     * Check if the request is from a mobile device or tablet.
     */
    private function isMobileOrTablet(Request $request): bool
    {
        $userAgent = $request->header('User-Agent');

        if (empty($userAgent)) {
            return false;
        }

        // Mobile and tablet detection patterns
        $mobilePatterns = [
            // Mobile devices
            'Mobile', 'Android', 'iPhone', 'iPod', 'BlackBerry',
            'Opera Mini', 'IEMobile', 'Windows Phone', 'webOS',
            'Palm', 'Samsung', 'SonyEricsson', 'Nokia', 'LG',
            'HTC', 'Motorola', 'Huawei', 'Xiaomi', 'OPPO', 'vivo',
            'Redmi', 'Realme', 'OnePlus', 'Google Pixel',

            // Tablets
            'iPad', 'Tablet', 'Kindle', 'Silk', 'PlayBook',
            'Nexus 7', 'Nexus 9', 'Nexus 10', 'Galaxy Tab',
            'Transformer', 'Surface', 'Touch'
        ];

        foreach ($mobilePatterns as $pattern) {
            if (stripos($userAgent, $pattern) !== false) {
                return true;
            }
        }

        return false;
    }
}
