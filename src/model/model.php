<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author nguyen.xuan.tam
 */
class model {

    public static function modelWrite($data = array()) {
        $validate = isset($data['rules']) ? $data['rules'] : '';
        $fillable = isset($data['fillable']) ? $data['fillable'] : '';
        $model = 
"<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class " . $data['name'] . " extends Model {
    /**
     *
     * @var type 
     */
    public static " . "$" . "rules" . " = [\n"
                . $validate .
                "    ];
    /**
     *
     * @var type 
     */
    protected " . "$" . "fillable" . " = [\n"
        .$fillable.
   "    ];
}";
        return $model;
    }

}
