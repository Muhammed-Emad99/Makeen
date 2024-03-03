<?php

namespace App\Http\Controllers\Dashboard;

use App\Base\Repositories\TrainingRepository;
use App\Helpers\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TrainingRequest;
use App\Models\Training;
use Illuminate\Support\Facades\File;

class TrainingController extends Controller
{

    protected $trainingRepository;

    public function __construct(TrainingRepository $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = $this->trainingRepository->getAll();
        return view('dashboard.trainings.index', compact('trainings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingRequest $request)
    {
        $data = $request->except('_token', 'icon');
        $path = 'uploads/trainings/';

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }

        $result = $this->trainingRepository->create($data);
        if ($result) {
            return redirect()->route('admin.trainings.index')->with('success', 'تم اضافة الصوره بنجاح');
        } else {
            return redirect()->route('admin.trainings.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.trainings.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('dashboard.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingRequest $request, $id)
    {
        $data = $request->except('_token', 'icon');
        $path = 'uploads/trainings/';
        $training = $this->trainingRepository->find($id);

        if ($request->hasFile('icon')) {
            if (File::exists($path . $training->icon) && $training->icon != null) {
                unlink($path . $training->icon);
            }
            $icon = $request->file('icon');
            $data['icon'] = Image::uploadImage($icon, 'icon', $path);
        }

        $result = $this->trainingRepository->update($data, $id);
        if ($result) {
            return redirect()->route('admin.trainings.index')->with('success', 'تم التعديل بنجاح');
        } else {
            return redirect()->route('admin.trainings.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $training = $this->trainingRepository->find($id);

        if ($training) {
            $path = 'uploads/trainings/';

            if (File::exists($path . $training->icon) && $training->icon != null) {
                unlink($path . $training->icon);
            }
        }
        $this->trainingRepository->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
