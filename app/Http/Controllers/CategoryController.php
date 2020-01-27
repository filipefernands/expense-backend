<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Utils\ListInformation;
use App\Model\Category;

class CategoryController extends Controller {

    public function __construct(Category $category) {
        $this->category = $category;
    }
    
    public function listAllCategories(Request $request) {
        $pageSize = $request->pageSize ? $request->pageSize : 10;

        $categories = DB::table('category')->paginate($pageSize);
        $page = new ListInformation($categories->total(), $categories->lastPage());
        $result = [];

        foreach ($categories as $item) {
            $result[] = array(
                "id" => $item->id,
                "name" => $item->name,
                "inactive" => $item->inactive
            );
        }

        $categoriesOutput = array("categories" => $result);
        $categoriesOutput['listInformation'] =  $page::pagination();

        return response($categoriesOutput, 200)->header('Content-Type', 'application/json');
    }

    public function getCategory($id) {
        return response($this->category->getUser($id), 200)->header('Content-Type', 'application/json');
    }

    public function createCategory(Request $request) {
        $category = Category::where('name', $request->name)->count();

        if ($category > 0) {
            return response(['message' => 'Categoria já cadastrada.'], 400);
        }

        Category::create($request->all());
        Log::info(sprintf('Categoria %s cadastrada com sucesso.', $request->name));

        return response(['category' => $request->name], 200)->header('Content-Type', 'application/json');
    }

    public function updateCategory(Request $request) {
        $categories = Category::where('id', $request->id)->update($request->all());

        if ($categories > 0) {
            return response(['message' => 'Categoria atualizada com sucesso.']);
        }

        return response(['message' => 'Não foi possível atualizar está categoria.'], 400)
            ->header('Content-Type', 'application/json');
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);
        $name = $category->name;

        if ($category->delete()) {
            Log::info(sprintf('Categoria %s excluída com sucesso.', $name));
            return response("{}", 200)->header('Content-Type', 'application/json');
        }
    }

}
