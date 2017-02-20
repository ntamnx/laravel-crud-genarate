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
        $this->makeController($data);
        $this->makeViewList($data);
        $this->makeViewAdd($data);
        $this->makeViewEdit($data);
        $this->makeViewShow($data);
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
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @function make repository
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
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @function make controller
     */
    private function makeController($data = array()) {
        $path = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Http/Controllers';
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . ucfirst($data['nameModel'] . 'Controller') . '.php';
            if (!\File::exists($pathToFile)) {
                $contentArray['name'] = $data['nameModel'];
                $content              = \controller::controllerWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile           = $path . DIRECTORY_SEPARATOR . ucfirst($data['nameModel'] . 'Controller') . '.php';
            $contentArray['name'] = $data['nameModel'];
            $content              = \controller::controllerWrite($contentArray);
            \File::put($pathToFile, $content);
        }
    }

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @function make ApiController
     */
    private function makeApiController($data = array()) {
        
    }

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @function make Criteria for search
     */
    private function makeCriteria($data = array()) {
        
    }

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @functione make view list.
     */
    private function makeViewList($data = array()) {
        $path         = base_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . lcfirst($data['nameModel']);
        $buildHead    = '';
        $buildContent = '';
        foreach ($data['value'] as $item) {
            $buildHead .= "\t\t\t<td>" . $item['column'] . "</td>\n";
            $buildContent.="\t\t\t<td>{{" . "$" . "item->" . $item['column'] . "}}</td>\n";
        }
        $buildHead.="\t\t\t<td>show</td>\n";
        $buildHead.="\t\t\t<td>Edit</td>\n";
        $buildHead.="\t\t\t<td>Delete</td>\n";
        //===============================//
        $buildContent.="\t\t\t<td><a class='btn' href='{{route('" . lcfirst($data['nameModel'] . ".show'," . "$" . "item->id") . ")}}'>show</a></td>\n";
        $buildContent.="\t\t\t<td><a class='btn' href='{{route('" . lcfirst($data['nameModel'] . ".edit'," . "$" . "item->id") . ")}}'>edit</a></td>\n";
        $buildContent.="\t\t\t<td> <form method='POST' action='{{route('" . lcfirst($data['nameModel'] . ".destroy'," . "$" . "item->id") . ")}}'>
                                <input type='hidden' name='_method' value='DELETE'>
                                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                                <button type='submit' class='btn btn-danger'>delete</button>
                            </form></td>\n";

//                . "<a class='btn' href='{{route('" . lcfirst($data['nameModel'] . ".delete'," . "$" . "item->id") . ")}}'>delete</a>
        //===============================//
        $contentArray['thead'] = "\n\t\t    <tr>\n" . $buildHead . "\t\t    </tr>\n";
        $contentArray['tbody'] = "\t\t    <tr>\n" . $buildContent . "\t\t    </tr>";
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . 'index.blade.php';
            if (!\File::exists($pathToFile)) {
                $contentArray['name'] = $data['nameModel'];
                $content              = \index::indexWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile           = $path . DIRECTORY_SEPARATOR . 'index.blade.php';
            $contentArray['name'] = $data['nameModel'];
            $content              = \index::indexWrite($contentArray);
            \File::put($pathToFile, $content);
        }
    }

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @functione make view add.
     */
    private function makeViewAdd($data = array()) {
        $path         = base_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . lcfirst($data['nameModel']);
        $buildContent = '';
        foreach ($data['value'] as $item) {
            $buildContent .= "
                    <div class='form-group'>
                        <label>" . $item['column'] . "</label>
                        <input type='text' name='" . $item['column'] . "' class='form-control' value='{{old('" . $item['column'] . "')}}' />
                    </div>\n";
        }
        $contentArray['content'] = $buildContent;
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . 'add.blade.php';
            if (!\File::exists($pathToFile)) {
                $contentArray['name'] = $data['nameModel'];
                $content              = \add::addWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile           = $path . DIRECTORY_SEPARATOR . 'add.blade.php';
            $contentArray['name'] = $data['nameModel'];
            $content              = \add::addWrite($contentArray);
            \File::put($pathToFile, $content);
        }
    }

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @functione make view edit.
     */
    private function makeViewEdit($data = array()) {
        $path         = base_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . lcfirst($data['nameModel']);
        $buildContent = '';
        foreach ($data['value'] as $item) {
            $buildContent .= "
                    <div class='form-group'>
                        <label>" . $item['column'] . "</label>
                        <input type='text' name='" . lcfirst($item['column']) . "' class='form-control' value='{{" . "$" . lcfirst($data['nameModel']) . "['" . $item['column'] . "']}}' />
                    </div>\n";
        }
        $contentArray['content'] = $buildContent;
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . 'edit.blade.php';
            if (!\File::exists($pathToFile)) {
                $contentArray['name'] = $data['nameModel'];
                $content              = \edit::editWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile           = $path . DIRECTORY_SEPARATOR . 'edit.blade.php';
            $contentArray['name'] = $data['nameModel'];
            $content              = \edit::editWrite($contentArray);
            \File::put($pathToFile, $content);
        }
    }

    /**
     * @date 20/2/2017
     * @author tamnx
     * @param type $data
     * @functione make view show.
     */
    private function makeViewShow($data = array()) {
        $path         = base_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . lcfirst($data['nameModel']);
        $buildContent = '';
        foreach ($data['value'] as $item) {
            $buildContent .= "
                    <div class='form-group'>
                        <label>" . $item['column'] . "</label>
                        <input type='text' hidden name='" . lcfirst($item['column']) . "' class='form-control' value='{{" . "$" . lcfirst($data['nameModel']) . "['" . $item['column'] . "']}}' />
                    </div>\n";
        }
        $contentArray['content'] = $buildContent;
        if (\File::isDirectory($path)) {
            $pathToFile = $path . DIRECTORY_SEPARATOR . 'show.blade.php';
            if (!\File::exists($pathToFile)) {
                $contentArray['name'] = $data['nameModel'];
                $content              = \show::showWrite($contentArray);
                \File::put($pathToFile, $content);
            }
        } else {
            \File::makeDirectory($path, 0777, true, true);
            $pathToFile           = $path . DIRECTORY_SEPARATOR . 'show.blade.php';
            $contentArray['name'] = $data['nameModel'];
            $content              = \show::showWrite($contentArray);
            \File::put($pathToFile, $content);
        }
    }

}
