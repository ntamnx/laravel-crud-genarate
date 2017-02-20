<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author nguyen.xuan.tam
 */
class controller {

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     */
    public static function controllerWrite($data = array()) {

        $controller = "<?php
            
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories" . "\\" . $data['name'] . "Repository;
use Prettus\Repository\Criteria\RequestCriteria;
use Validator;

class " . $data['name'] . "Controller  extends Controller {
    /**
     *
     * @var type 
     */
    private " . "$" . lcfirst($data['name']) . "Repository;
    public function __construct(" . $data['name'] . "Repository " . "$" . lcfirst($data['name']) . "Repository) {
        " . "$" . "this->" . lcfirst($data['name']) . "Repository = " . "$" . lcfirst($data['name']) . "Repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request " . "$" . "request) {
        " . "$" . "this->" . lcfirst($data['name']) . "Repository->pushCriteria(new RequestCriteria(" . "$" . "request));
        " . "$" . lcfirst($data['name']) . " = " . "$" . "this->" . lcfirst($data['name']) . "Repository->paginate(config('common.page_size'));
        return view('" . lcfirst($data['name']) . ".index')
                        ->with('" . lcfirst($data['name']) . "'," . "$" . lcfirst($data['name']) . ");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
       return view('" . lcfirst($data['name']) . ".add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  " . "$" . "request
     * @return \Illuminate\Http\Response
     */
    public function store(Request " . "$" . "request) {
        " . "$" . "this->validate(" . "$" . "request, \App\Entities" . "\\" . ucfirst($data['name']) . "::" . "$" . "rules);
        " . "$" . "this->" . lcfirst($data['name']) . "Repository->create(" . "$" . "request->all());
        \Session::flash('flash_success', trans('common.CREATE_SUCESS'));
        return redirect(route('" . lcfirst($data['name']) . ".index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  " . "$" . "id
     * @return \Illuminate\Http\Response
     */
    public function show(" . "$" . "id) {
        " . "$" . lcfirst($data['name']) . " = " . "$" . "this->" . lcfirst($data['name']) . "Repository->find(" . "$" . "id);
        return view('" . lcfirst($data['name']) . ".show')
                        ->with('" . lcfirst($data['name']) . "',  " . "$" . lcfirst($data['name']) . ");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  " . "$" . "id
     * @return \Illuminate\Http\Response
     */
    public function edit(" . "$" . "id) {
        " . "$" . lcfirst($data['name']) . " = " . "$" . "this->" . lcfirst($data['name']) . "Repository->find(" . "$" . "id);
        return view('" . lcfirst($data['name']) . ".edit')
                        ->with('" . lcfirst($data['name']) . "',  " . "$" . lcfirst($data['name']) . ");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  " . "$" . "request
     * @param  int  " . "$" . "id
     * @return \Illuminate\Http\Response
     */
    public function update(Request " . "$" . "request, " . "$" . "id) {
        " . "$" . "rules = ['name' => 'required|max:255|min:6|unique:categories,name,' . " . "$" . "id] + \App\Entities" . "\\" . ucfirst($data['name']) . "::" . "$" . "rules;
        " . "$" . "this->validate(" . "$" . "request, " . "$" . "rules);
        " . "$" . "this->" . lcfirst($data['name']) . "->update(" . "$" . "request->all(), " . "$" . "id);
        \Session::flash('flash_success', trans('common.UPDATE_SUCCESS'));
        return redirect(route('" . lcfirst($data['name']) . ".index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  " . "$" . "id
     * @return \Illuminate\Http\Response
     */
    public function destroy(" . "$" . "id) {
        " . "$" . "this->" . lcfirst($data['name']) . "Repository->delete(" . "$" . "id);
        \Session::flash('flash_success', trans('common.DELETE_SUCCESS'));
        return \Redirect::back();
    }
    
}";
        return $controller;
    }

}
