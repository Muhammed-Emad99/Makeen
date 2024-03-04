<?php

namespace App\Http\Controllers\Dashboard;

use App\Base\Repositories\ServiceRepository;
use App\Helpers\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServiceRequest;
use App\Jobs\NewServiceNotification;
use App\Models\Category;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{

    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceRepository->getAll();
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->except('_token', 'image', 'icon');
        $path = 'uploads/services/';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = Image::uploadImage($image, 'image', $path);
        }

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }


        $result = $this->serviceRepository->create($data);

        dispatch(new NewServiceNotification($result));


        if ($result) {
            return redirect()->route('admin.services.index')->with('success', 'تم اضافة الاضافة بنجاح');
        } else {
            return redirect()->route('admin.services.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.services.create',compact('categories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('dashboard.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, $id)
    {
        $data = $request->except('_token', 'image', 'icon');
        $path = 'uploads/services/';
        $service = $this->serviceRepository->find($id);


        if ($request->hasFile('image')) {
            $image = Slider::where('id', $id)->get('image')->first();
            if (File::exists($path . $service->image) && $service->image != null) {
                unlink($path . $service->image);
            }
            $image = $request->file('image');
            $data['image'] = Image::uploadImage($image, 'image', $path);
        }

        if ($request->hasFile('icon')) {
            $icon = Slider::where('id', $id)->get('icon')->first();
            if (File::exists($path . $service->icon) && $service->icon != null) {
                unlink($path . $service->icon);
            }
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }

        $result = $this->serviceRepository->update($data, $id);
        if ($result) {
            return redirect()->route('admin.services.index')->with('success', 'تم التعديل بنجاح');
        } else {
            return redirect()->route('admin.services.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->find($id);

        if ($service) {
            $path = 'uploads/services/';

            if (File::exists($path . $service->image) && $service->image != null) {
                unlink($path . $service->image);
            }

            if (File::exists($path . $service->icon) && $service->icon != null) {
                unlink($path . $service->icon);
            }
        }
        $this->serviceRepository->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
