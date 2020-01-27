<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\Category;
use App\Model\SubCategory;
use App\Utils\ListInformation;
use App\Utils\Messages as msg;

class SubCategoryController extends Controller {

    public function __construct(Subcategory $subCategory) {
        $this->subCategory = $subCategory;
    }

    public function listAllCategories(Request $request) {
        $pageSize = $request->pageSize ? $request->pageSize : 10;

        $subCategories = DB::table('sub_category')->paginate($pageSize);
        $page = new ListInformation($subCategories->total(), $subCategories->lastPage());
        $result = [];

        foreach ($subCategories as $item) {
            $result[] = array(
                "id" => $item->id,
                "name" => $item->name,
                "inactive" => $item->inactive
            );
        }

        $subCategoryOutput = array("subcategories" => $result);
        $subCategoryOutput["listInformation"] = $page::pagination();

        return response($subCategoryOutput, 200)->header('Content-Type', 'application/json');
    }

    public function getSubCategory($id) {
        return response($this->subCategory->findById($id), 200)->header('Content-Type', 'application/json');
    }

    public function createSubcategory(Request $request) {
        $subCategory = SubCategory::where('name', $request->name)->count();
        $foundCategory = $this->getCategory($request->category);

        if ($subCategory > 0) {
            return response(['message' => msg::getFormattedMessage('CATEGORY_EXISTS', $request->name)], 400)
                ->header('Content-Type', 'application/json');
        }

        if (empty($foundCategory)) {
            return response(['message' => msg::getFormattedMessage('NOT_FOUND_CATEGORY', $request->category)], 400)
                ->header('Content-Type', 'application/json');
        } else {
            if (!$foundCategory->inactive) {
                SubCategory::create([
                    "name" => $request->name,
                    "category_id" => $foundCategory->id,
                    "inactive" => $request->inactive
                ]);
            } else {
                return response(['massege' => msg::getFormattedMessage('CATEGORY_INACTIVE', $request->category)], 200)
                    ->header('Content-Type', 'application/json');
            }
        }

        return response(['subcategory' => $request->name], 201);
    }

    public function updateCategory(Request $request) {
        $foundCategory = $this->getCategory($request->category);
        $subCategory = SubCategory::find($request->id);

        $subCategory->name = $request->name;
        $subCategory->category_id = $foundCategory->id;
        $subCategory->inactive = $request->inactive;
        $subCategory->save();

        return response(['subcategory' => $request->name], 201)->header('Content-Type', 'application/json');
    }

    public function deleteSubcategory($id) {
        $subCategory = SubCategory::findOrfail($id);
        $name = $subCategory->name;

        if ($subCategory->delete()) {
            return response(['message' => msg::getFormattedMessage('DELETE_SUBCATEGORY', $name)], 200)
                ->header('Content-Type', 'application/json');
        }
    }

    private function getCategory($category) {
        $found = Category::where('name', $category)->first();
        return $found ? $found : "";
    }
    
}
