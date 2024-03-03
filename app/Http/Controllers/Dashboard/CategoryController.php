<?php

namespace App\Http\Controllers\Dashboard;


use App\Base\Repositories\ServiceCategoryRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(ServiceCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->categoryRepository->create($request->all());

        if ($result) {
            return redirect()->route('admin.categories.index')->with('success', 'تم اضافة الصوره بنجاح');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $result = $this->categoryRepository->update($request->all(), $id);

        if ($result) {
            return redirect()->route('admin.categories.index')->with('success', 'تم التعديل بنجاح');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
