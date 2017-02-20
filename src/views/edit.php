<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edit
 *
 * @author nguyen.xuan.tam
 */
class edit {

    public static function editWrite($data = array()) {
        $add = "@extends('app')
@section('htmlheader_title')
Edit " . $data['name'] . "
@endsection
@section('css')
@endsection
@section('main-content')
<div class='row'>
    <div class='col-sm-12'>
        <div class='panel panel-info'>
            <div class='panel-heading text-center'>
               Edit " . $data['name'] . "
            </div>
            <div class='panel-body'>
                <form action='{{route('" . lcfirst($data['name']) . ".update',"."$". lcfirst($data['name']) . "->id)}}' method='POST' id='frm-edit'>
                    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                    <input type='hidden' name='method' value='PUT'/>
                    " . $data['content'] . "
                    <div class='panel-footer'>
                        <button type='submit' class='btn btn-primary' id='btn_edit'>submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
{!! JsValidator::make(App\Entities" . '\\' . $data['name'] . "::" . "$" . "rules,[],[],'#frm-edit')!!}
@endsection";
        return $add;
    }

}
