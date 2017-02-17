<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of criteria
 *
 * @author nguyen.xuan.tam
 */
class criteria {

    public static function criteriaWrite($data = array()) {
        $model = "<?php
            
namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

class " . $data['name'] . " implements CriteriaInterface {

    protected " . "$" . "request;
    public function __construct(Request " . "$" . "request) {
        " . "$" . "this->request = " . "$" . "request;
    }
    /**
     * Apply criteria in query repository
     *
     * @param                     " . "$" . "model
     * @param RepositoryInterface " . "$" . "repository
     *
     * @return mixed
     */
    public function apply(" . "$" . "model, RepositoryInterface " . "$" . "repository) {
        " . "$" . "keyword = " . "$" . "this->request->get('keyword');
        if (!isset(" . "$" . "keyword)) {
            return " . "$" . "model;
        }
        " . "$" . "model = " . "$" . "model->where('keyword', '=', " . "$" . "keyword);
        return " . "$" . "model;;
    }
}";
        return $model;
    }

}
