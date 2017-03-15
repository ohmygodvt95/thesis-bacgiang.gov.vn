<?php

namespace App\Http\Controllers;

use App\Category;
use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newsInProvince = Category::find(15);
        $newsInCountry = Category::find(16);
        $newsInInternational = Category::find(17);

        $newsAndEvents = Category::find(22);

        $infoManagementTexts = Category::find(23);
        $infoManagementFiles = Category::find(24);

        $help = Category::find(29);

        $talent = Category::find(40);

        $docs = Category::find(25);
        return view('home.index',[
            'newsInProvince' => $newsInProvince,
            'newsInCountry' => $newsInCountry,
            'newsInInternational' => $newsInInternational,
            'newsAndEvents' => $newsAndEvents,
            'infoManagementTexts' => $infoManagementTexts,
            'infoManagementFiles' => $infoManagementFiles,
            'help' => $help,
            'talent' => $talent,
            'docs' => $docs,
            'receive' => Service::all()->count(),
            'success' => Service::where('status', 2)->count()
        ]);
    }
}
