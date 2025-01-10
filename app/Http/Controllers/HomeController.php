<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Slider;
use App\Models\BodyHeader;
use App\Models\ProductHeading;
use App\Models\ProductContent;
use App\Models\FaqHeader;
use App\Models\Faq;
use App\Models\About;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $bodies = Body::where('is_active', true)
                        ->orderBy('order')
                        ->get();
                        
        $sliders = Slider::where('is_active', true)
                        ->orderBy('order')
                        ->get();
                        
        $BodyHeader = BodyHeader::where('is_active', true)
                        ->first();
                        
        $ProductHeading = ProductHeading::where('is_active', true)
                        ->first();
           
        $ProductContents = ProductContent::where('is_active', true)
        ->orderBy('order')
        ->get();

        $faqHeader = FaqHeader::first();

        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->get();

        $about = About::where('is_active', true)->first();

        return view('home', compact('bodies', 'sliders', 'BodyHeader', 'ProductHeading', 'ProductContents', 'faqHeader', 'faqs', 'about'));
      

    }
} 