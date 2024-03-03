<?php

namespace App\Http\Controllers\Dashboard;

use App\Base\Repositories\PartnerRepository;
use App\Helpers\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PartnerRequest;
use App\Models\Partner;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{

    protected $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = $this->partnerRepository->getAll();
        return view('dashboard.partners.index', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $data = $request->except('_token', 'image');
        $path = 'uploads/partners/';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = Image::uploadImage($image, 'image', $path);
        }
        $result = $this->partnerRepository->create($data);

        if ($result) {
            return redirect()->route('admin.partners.index')->with('success', 'تم اضافة الصوره بنجاح');
        } else {
            return redirect()->route('admin.partners.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.partners.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('dashboard.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, $id)
    {
        $data = $request->except('_token', 'image');
        $path = 'uploads/partners/';

        if ($request->hasFile('image')) {
            $image = Partner::where('id', $id)->get('image')->first();
            if (File::exists($path . $image) && $image != null) {
                unlink($path . $image);
            }
            $image = $request->file('image');
            $data['image'] = Image::uploadImage($image, 'image', $path);
        }

        $result = $this->partnerRepository->update($data, $id);

        if ($result) {
            return redirect()->route('admin.partners.index')->with('success', 'تم تعديل الصوره بنجاح');
        } else {
            return redirect()->route('admin.partners.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = $this->partnerRepository->find($id);

        if ($partner) {
            $path = 'uploads/partners/';

            if (File::exists($path . $partner->image) && $partner->image != null) {
                unlink($path . $partner->image);
            }

        }
        $this->partnerRepository->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
