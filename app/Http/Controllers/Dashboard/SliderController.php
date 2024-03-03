<?php

namespace App\Http\Controllers\Dashboard;

use App\Base\Repositories\SliderRepository;
use App\Helpers\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{

    protected $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = $this->sliderRepository->getAll();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data = $request->except('_token', 'image', 'icon');
        $path = 'uploads/sliders/';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = Image::uploadImage($image, 'image', $path);
        }

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }

        $result = $this->sliderRepository->create($data);
        if ($result) {
            return redirect()->route('admin.sliders.index')->with('success', 'تم اضافة الصوره بنجاح');
        } else {
            return redirect()->route('admin.sliders.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, $id)
    {
        $data = $request->except('_token', 'image', 'icon');
        $path = 'uploads/sliders/';

        if ($request->hasFile('image')) {
            $image = Slider::where('id',$id)->get('image')->first();
            if (File::exists($path . $image) && $image != null) {
                unlink($path . $image);
            }
            $image = $request->file('image');
            $data['image'] = Image::uploadImage($image, 'image', $path);
        }

        if ($request->hasFile('icon')) {
            $icon = Slider::where('id',$id)->get('icon')->first();
            if (File::exists($path . $icon) && $icon != null) {
                unlink($path . $icon);
            }
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }

        $result = $this->sliderRepository->update($data, $id);
        if ($result) {
            return redirect()->route('admin.sliders.index')->with('success', 'تم تعديل الصوره بنجاح');
        } else {
            return redirect()->route('admin.sliders.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);

        if ($slider) {
            $path = 'uploads/sliders/';

            if (File::exists($path . $slider->image) && $slider->image != null) {
                unlink($path . $slider->image);
            }

            if (File::exists($path . $slider->icon) && $slider->icon != null) {
                unlink($path . $slider->icon);
            }
        }
        $this->sliderRepository->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
