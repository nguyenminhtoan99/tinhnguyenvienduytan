<?php

namespace App\Http\Controllers\Client;

use App\Banner;
use App\Event;
use App\Http\Controllers\Controller;
use App\News;
use App\Sponsor;
use App\Volunteer;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $events = Event::orderBy('id', 'DESC')->where('status', Event::STATUS_TRUE)->paginate(2);
        $event_random = Event::orderBy('id', 'DESC')->where('status', Event::STATUS_TRUE)->paginate(5);
        $banners = Banner::limit(3)->orderBy('id', 'DESC')->get();
        $news = News::orderBy('id', 'DESC')->take(3)->get();
        $sponsors = Sponsor::all()->count();
        $volunteers = Volunteer::all()->count();
        $eventmore = Event::all()->count();

        return view('main.pages.body', compact('banners', 'news', 'events', 'event_random', 'sponsors', 'volunteers', 'eventmore'));
    }
}
