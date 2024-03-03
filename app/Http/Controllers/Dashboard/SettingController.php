<?php

namespace App\Http\Controllers\Dashboard;

use App\Base\Interfaces\SettingRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Helpers\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $settings = $this->settingRepository->getAll();

        return view('dashboard.settings.edit', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 'logo', 'favicon', 'about_us_image');
        $path = 'uploads/';
        if ($request->hasFile('logo')) {
            $logo = $this->settingRepository->getWhere([['key', 'logo']])->first();
            if (File::exists($path . $logo) && $logo != null) {
                unlink($path . $logo);
            }
            $logoImage = $request->file('logo');
            $data['logo'] = Image::uploadImage($logoImage, 'logo', $path);
        }

        if ($request->hasFile('favicon')) {
            $favicon = $this->settingRepository->getWhere([['key', 'favicon']])->first();
            if (File::exists($path . $favicon) && $favicon != null) {
                unlink($path . $favicon);
            }

            $faviconImage = $request->file('favicon');
            $imageName =  $faviconImage->getClientOriginalName();
            $faviconImage->move(public_path($path), $imageName);
            $data['favicon'] = $imageName;

        }


        if ($request->hasFile('about_us_image')) {
            $about_us_image = $this->settingRepository->getWhere([['key', 'about_us_image']])->first();

            if (File::exists($path . $about_us_image) && $about_us_image != null) {
                unlink($path . $about_us_image);
            }

            $aboutUsImage = $request->file('about_us_image');
            $data['about_us_image'] = Image::uploadImage($aboutUsImage, 'aboutUs', $path);
        }


        if ($request->hasFile('our_feature_image')) {
            $our_feature_image = $this->settingRepository->getWhere([['key', 'our_feature_image']])->first();

            if (File::exists($path . $our_feature_image) && $our_feature_image != null) {
                unlink($path . $our_feature_image);
            }

            $featureImage = $request->file('our_feature_image');
            $data['our_feature_image'] = Image::uploadImage($featureImage, 'feature', $path);
        }


        if ($request->hasFile('our_training_image')) {
            $our_training_image = $this->settingRepository->getWhere([['key', 'our_training_image']])->first();

            if (File::exists($path . $our_training_image) && $our_training_image != null) {
                unlink($path . $our_training_image);
            }

            $trainingImage = $request->file('our_training_image');
            $data['our_training_image'] = Image::uploadImage($trainingImage, 'training', $path);
        }

        $this->settingRepository->updateSetting($data);
        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

}
