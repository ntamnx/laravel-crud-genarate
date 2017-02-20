<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of repository
 *
 * @author nguyen.xuan.tam
 */
class repository {

    public static function repositoryWrite($data = array()) {
        $fieldSearchable = isset($data['fieldSearchable']) ? $data['fieldSearchable'] : '';
        $repository = "<?php
namespace App\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
class ".$data['name']."Repository extends BaseRepository {
    /**
     *
     * @var type 
     */
    protected"."$"."fieldSearchable"." = [\n"
     .$fieldSearchable.
    "\t];
    /**
     * 
     * @return type
     */
    public function model() {
        return \App\Entities"."\\".$data['name']."::class;
    }
}";
        return $repository;
    }

}
