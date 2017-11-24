<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of show
 *
 * @author nguyen.xuan.tam
 */
class show {

    public static function showWrite($data = array()) {
        $show = "@extends('app')
@section('htmlheader_title')
Show " . $data['name'] . "
@endsection
@section('css')
@endsection
@section('main-content')
<div class='row'>
    <div class='col-sm-12'>
        <div class='panel panel-info'>
            <div class='panel-heading text-center'>
               Show " . $data['name'] . "
            </div>
            <div class='panel-body'>
                    " . $data['content'] . "
                    <div class='panel-footer'>
                        <button type='button' class='btn btn-primary' id='btn_edit'>Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>";
        return $show;
    }

}
