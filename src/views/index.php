<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author nguyen.xuan.tam
 */
class index {

    public static function indexWrite($data = array()) {
        $index = "@extends('app')
@section('htmlheader_title')
    List ".$data['name']."
@endsection
@section('main-content')
<div class='col-xs-12'>
    <div class='box'>
        <div class='box-header'>
            <h3 class='box-title'>List ".lcfirst($data['name'])."</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
            <table id='example2' class='table table-bordered table-hover'>
                <thead>"
                     .$data['thead'].  
"               </thead>
                <tbody>
                    @foreach($" . lcfirst($data['name']) . " as "."$"."item)
"                    .$data['tbody'] . "
                    @endforeach        
                </tbody>
            </table>
            {{".lcfirst($data['name'])."}}
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection";
        return $index;
    }

}
