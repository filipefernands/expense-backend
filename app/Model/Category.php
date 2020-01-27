<?php

namespace App\Model;

use Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Utils\GenerateSQL as SQL;

class Category extends Model {
    
    protected $table =  "category";

    protected $fillable = ['id', 'name', 'inactive'];

    protected $hidden = [];

    public function getUser($id) {
        $colnames = SQL::aliasColname($this->fillable, $this->hidden);
        
        $category = DB::table($this->table)->select($colnames)->where('id', $id)->get();

        return json_encode($category[0]);
    }

}
