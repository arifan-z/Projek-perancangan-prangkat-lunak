<?php

namespace App\Http\Middleware;

use Closure;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AutoTranslate
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Pastikan response bisa diubah
        if (!method_exists($response, 'getContent')) {
            return $response;
        }

        $content = $response->getContent();
        $locale = session('locale', 'id'); // default bahasa Indonesia

        if ($locale !== 'id') {
            try {
                $tr = new GoogleTranslate();
                $tr->setSource('id');
                $tr->setTarget($locale);
                $content = $tr->translate($content);
            } catch (\Exception $e) {
                // kalau error biarin tampil normal
            }
        }

        $response->setContent($content);
        return $response;
    }
}
