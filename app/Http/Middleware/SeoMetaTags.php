<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeoMetaTags
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName(); // Assuming route names are 'home', 'about', etc.
        $locale = app()->getLocale(); // Current locale

        // Default meta for undefined routes
        $defaultMeta = [
            'title' => 'Mazoon Aluminum',
            'description' => 'welcome to Default Mazoon Aluminum website.',
            'keywords' => 'Aluminum, Mazoon Aluminum'
        ];

        // Attempt to load meta from localization files
        $metaKey = "meta.$routeName";
        $meta = trans($metaKey, [], $locale);

        // Check if the translation for the route is actually returned or if it defaults to the key
        if ($meta === $metaKey) {
            $meta = $defaultMeta;
        }

        // Share meta-tags with all views
        view()->share('metaTitle', $meta['title'] ?? $defaultMeta['title']);
        view()->share('metaDescription', $meta['description'] ?? $defaultMeta['description']);
        view()->share('metaKeywords', $meta['keywords'] ?? $defaultMeta['keywords']);

        return $next($request);
    }


}
