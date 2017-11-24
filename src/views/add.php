<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add
 *
 * @author nguyen.xuan.tam
 */
class add {

    public static function addWrite($data = array()) {
        $add = "@extends('app')
@section('htmlheader_title')
Add ".$data['name']."
@endsection
@section('css')
@endsection
@section('main-content')
<div class='row'>
    <div class='col-sm-12'>
        <div class='panel panel-info'>
            <div class='panel-heading text-center'>
               Add ".$data['name']."
            </div>
            <div class='panel-body'>
                <form action='{{route('".lcfirst($data['name']).".store')}}' method='POST' id='frm-add'>
                    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
                    ".$data['content']."
                    <div class='panel-footer'>
                        <button type='submit' class='btn btn-primary' id='btn_add'>submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
{!! JsValidator::make(App\Entities".'\\'.$data['name']."::" . "$" . "rules,[],[],'#frm-add')!!}
@endsection";
        return $add;
    }

}
