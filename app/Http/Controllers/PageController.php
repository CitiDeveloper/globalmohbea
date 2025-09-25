<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($page)
    {
        $allowedPages = [
            'about-us',
            'careers',
            'faqs',
            'privacy-policy',
            'terms-use',
            'cookie-policy',
        ];

        if (!in_array($page, $allowedPages)) {
            abort(404);
        }

        $view = str_replace('-', '_', $page); // Convert to blade file naming format if needed

        return view("pages.$view");
    }
}
