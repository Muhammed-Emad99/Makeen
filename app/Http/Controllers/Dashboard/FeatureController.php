<?php

namespace App\Http\Controllers\Dashboard;


use App\Helpers\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FeatureRequest;
use App\Models\Feature;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::all();
        return view('dashboard.features.index', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeatureRequest $request)
    {
        $data = $request->except('_token', 'icon');
        $path = 'uploads/features/';

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }
        $result = Feature::create($data);

        if ($result) {
            return redirect()->route('admin.features.index')->with('success', 'تم اضافة الصوره بنجاح');
        } else {
            return redirect()->route('admin.features.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.features.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('dashboard.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureRequest $request, $id)
    {
        $data = $request->except('_token', 'icon');
        $path = 'uploads/features/';

        $feature = Feature::find($id);

        if ($request->hasFile('icon')) {
            if (File::exists($path . $feature->icon) && $feature->icon != null) {
                unlink($path . $feature->icon);
            }
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }

        $result = $feature->update($data);

        if ($result) {
            return redirect()->route('admin.features.index')->with('success', 'تم تعديل الصوره بنجاح');
        } else {
            return redirect()->route('admin.features.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = Feature::find($id);

        if ($feature) {
            $path = 'uploads/features/';

            if (File::exists($path . $feature->icon) && $feature->icon != null) {
                unlink($path . $feature->icon);
            }
        }
        $feature->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
