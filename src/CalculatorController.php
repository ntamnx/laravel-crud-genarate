<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tamnx\Demo;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller {

    /**
     * @date 17/2/2017
     * @author tamnx
     * @return view create
     */
    public function create() {
        $result = 100;
        return view('views::add')
                        ->with('result', $result);
    }

    public function store(Request $request) {
        $path = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Entity';
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst('demo.') . 'php';
            if (!\File::exists($path)) {
                $content    = "content /n content";
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst('demo.') . 'php';
             $content    = 'content /n content';
            \File::put($pathToFile, $content);
        }
    }

    /**
     * @date 17/2/2017
     * @author tamnx
     * @param type $modelName is name model will create
     * @param type $attr those attribute of model.
     */
    private function makeModel($modelName, $attr = array()) {
        $path = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Entity';
        if (\File::isDirectory($path)) {
            
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst($modelName) . 'php';
            $content    = 'content/n'
                    . 'content';
            \File::put($pathToFile, $content);
        }
    }

    /**
     * 
     */
    public function contentModel() {
        
    }

    /**
     * 
     */
    private function makeRepository() {
        
    }

    /**
     * 
     */
    private function makeController() {
        
    }

    /**
     * 
     */
    private function makeApiController() {
        
    }

    /**
     * 
     */
    private function makeCriteria() {
        
    }

    /**
     * 
     */
    private function makeValidate() {
        
    }

    /**
     * 
     */
    private function makeViewList() {
        
    }

    /**
     * 
     */
    private function makeViewAdd() {
        
    }

    /**
     * 
     */
    private function makeViewEdit() {
        
    }

    /**
     * 
     */
    private function makeViewShow() {
        
    }

}
