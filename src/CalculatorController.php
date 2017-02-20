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
        return view('views::add');
    }

    /**
     * @date 200/2/2017
     * @author tamnx
     * @param Request $request
     * @function create template
     */
    public function store(Request $request) {
        $data = $request->all();
        $this->makeModel($data);
        $this->makeRepository($data);
    }

    /**
     * @date 17/2/2017
     * @author tamnx
     * @param type $modelName is name model will create
     * @param type $attr those attribute of model.
     */
    private function makeModel($data = array()) {
        $path = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Entity';
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst($data['nameModel']) . '.php';
            if (!\File::exists($pathToFile)) {
                $rules    = '';
                $fillable = '';
                foreach ($data['value'] as $item) {
                    $ruleOfField = '';
                    foreach ($item['ck_column'] as $index => $rule) {
                        if ($index === 0) {
                            $ruleOfField .= $rule;
                        }
                        if ($index === 1) {
                            $ruleOfField.='|' . $rule . ',' . $item['ck_column_table'] . ',' . $item['ck_column_column'];
                        }
                    }
                    $rules.= "\t'" . $item['column'] . "'" . '=>' . "'" . $ruleOfField . "'" . ',' . "\n";
                    $fillable .= "\t'" . $item['column'] . "'" . ',' . "\n";
                }
                $contentArray['name']     = $data['nameModel'];
                $contentArray['rules']    = $rules;
                $contentArray['fillable'] = $fillable;
                $content                  = \model::modelWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst($data['nameModel']) . '.php';
            $rules      = '';
            $fillable   = '';
            foreach ($data['value'] as $item) {
                $ruleOfField = '';
                foreach ($item['ck_column'] as $index => $rule) {
                    if ($index === 0) {
                        $ruleOfField .= $rule;
                    }
                    if ($index === 1) {
                        $ruleOfField.='|' . $rule . ',' . $item['ck_column_table'] . ',' . $item['ck_column_column'];
                    }
                }
                $rules.= "\t'" . $item['column'] . "'" . '=>' . "'" . $ruleOfField . "'" . ',' . "\n";
                $fillable .= "\t'" . $item['column'] . "'" . ',' . "\n";
            }
            $contentArray['name']     = $data['nameModel'];
            $contentArray['rules']    = $rules;
            $contentArray['fillable'] = $fillable;
            $content                  = \model::modelWrite($contentArray);
            \File::put($pathToFile, $content);
        }
    }

    /**
     * 
     * @param type $data
     */
    private function makeRepository($data = array()) {
        $path = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Repositories';
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst($data['nameModel'] . 'Repository') . '.php';
            if (!\File::exists($pathToFile)) {
                $contentArray['name'] = $data['nameModel'];
                $content              = \repository::repositoryWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile           = $path . DIRECTORY_SEPARATOR . ucfirst($data['nameModel'] . 'Repository') . '.php';
            $contentArray['name'] = $data['nameModel'];
            $content              = \repository::repositoryWrite($contentArray);
            \File::put($pathToFile, $content);
        }
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
