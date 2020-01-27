<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Utils\GenerateSQL as SQL;

class SubCategory extends Model {
    
    protected $table = "sub_category";

    protected $fillable = ['id', 'name', 'category_id', 'inactive'];

    protected $hidden = [];


    public function getAllSubCategories() {
        $colnames = SQL::aliasColname($this->fillable, $this->hidden);

        $subCategories = DB::table($this->table)->select($colnames)->get();

        return $subCategories;
    }

    public function findById($id) {
        $colnames = SQL::aliasColname($this->fillable, $this->hidden);

        $subCategory = DB::table($this->table)->select($colnames)->where('id', $id)->get();
        
        return json_encode($subCategory[0]);
    }
}
