<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ContactRequest;
use App\Http\Requests\Dashboard\SubscribeRequest;
use App\Http\Requests\Site\OrderRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $settings = Setting::all();
        $sliders = Slider::all();
        $categories = Category::with('services')->get();
        $features = Feature::all();
        $partners = Partner::all();
        $trainings = Training::all();

        return view('site.home.index', compact('settings', 'categories', 'features', 'partners', 'sliders', 'trainings'));
    }

    public function lang(Request $request, $locale)
    {

        session()->put('lang', $locale);
//        dd(session('lang'));
        return redirect()->back()->with('success', 'Language changed successfully');
    }

    public function orderService(OrderRequest $request)
    {
        $order = Order::create($request->all());
        return response()->json(['success' => 'تم الطلب الخدمة بنجاح وسوف يتم الرد عليك في اقرب وقت ممكن']);
    }

    public function subscribe(SubscribeRequest $request)
    {
        Subscribe::create($request->all());
        return response()->json(['success' => 'تم الاشتراك بنجاح وسوف يتم ارسال الاخبار اليك في اقرب وقت ممكن']);

    }

    public function sendContact(ContactRequest $request)
    {
        Contact::create($request->all());
        return response()->json(['success' => 'تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت']);
    }

    public function show($id)
    {
        $categories = Category::all();
        $service = Service::find($id);
        return view('site.services.show', compact('categories','service'));
    }
}
