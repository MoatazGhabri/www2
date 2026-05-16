<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\ServiceWeb;
use App\Models\Store;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index()
    {
        $properties = Property::where('status', 1)->get();
        $services = ServiceWeb::all();
        $stores = Store::all();

        $content = view('sitemap.index', compact('properties', 'services', 'stores'));
        
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

    public function properties()
    {
        $properties = Property::where('status', 1)->get();
        
        $content = view('sitemap.properties', compact('properties'));
        
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

    public function services()
    {
        $services = ServiceWeb::all();
        
        $content = view('sitemap.services', compact('services'));
        
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

    public function stores()
    {
        $stores = Store::all();
        
        $content = view('sitemap.stores', compact('stores'));
        
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
