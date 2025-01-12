<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\Backend\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    public function allCategory(){
        return $this->categoryRepository->allCategory(); 
    }

    public function addCategory(){
        return $this->categoryRepository->addCategory();
    }

    public function storeCategory(CategoryRequest $request){
            return $this->categoryRepository->storeCategory($request);
    }

    public function deleteCategory($id){
        return $this->categoryRepository->deleteCategory($id);
    }

    public function editCategory($id){
        return $this->categoryRepository->editCategory($id);
    }

    public function updateCategory(CategoryRequest $request){
        return $this->categoryRepository->updateCategory($request);
    }
}
