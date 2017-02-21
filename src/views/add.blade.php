<!DOCTYPE html>
<html>
    <head>
        <title>Calculator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            table{
            }
            td{
                font-size: 15px;
                padding: 10px;
            }
            .error{
                color: red;
                font-size: 10px;
            }
        </style>
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading" >CRUD generate</div>
            <div class="panel-body">
                <form method="POST" action="{{url('tamnx/crud/store')}}" id="frm_crud_create">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <table class="col-lg-10 col-lg-offset-1" id="table-content">
                        <tr>
                            <td>Name model</td>
                            <td colspan="7">
                                <input class="form-control"  type="text" name="nameModel"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Colum1</td>
                            <td>
                                <input class="form-control required1"  type="text" name="value[1][column]">
                            </td>
                            <td>  
                                Required <input type="checkbox" name="value[1][ck_column][]" value="required"> 
                                Unique <input type="checkbox" class="unique" name="value[1][ck_column][]" value="unique"> 
                            </td>
                            <td>
                                Name column
                            </td>
                            <td>
                                <input type="text" disabled class="form-control input_column" name="value[1][ck_column_column]"> 
                            </td>
                            <td>
                                Name table 
                            </td>
                            <td>
                                <input type="text" disabled class="form-control input_table" name="value[1][ck_column_table]">
                            </td>
                            <td><button type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Colum2</td>
                            <td><input class="form-control required1" type="text" name="value[2][column]"></td>
                            <td>
                                Required <input  type="checkbox" name="value[2][ck_column][]" value="required"> 
                                Unique <input type="checkbox" class="unique" name="value[2][ck_column][]" value="unique"> 
                            </td>
                            <td> Name column</td>
                            <td> <input type="text" disabled class="form-control input_column" name="value[2][ck_column_column]"> </td>
                            <td> Name table</td>
                            <td>
                                <input type="text" disabled class="form-control input_table" name="value[2][ck_column_table]">
                            </td>
                            <td><button type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Colum3</td>
                            <td>
                                <input class="form-control required1" type="text" name="value[3][column]">
                            </td>
                            <td>
                                Required <input type="checkbox" name="value[3][ck_column][]" value="required"> 
                                Unique <input type="checkbox" class="unique" name="value[3][ck_column][]" value="unique"> 
                            </td>
                            <td>Name column</td>
                            <td><input class="form-control input_column" disabled type="text" name="value[3][ck_column_column]"> </td>
                            <td> Name table</td>
                            <td>
                                <input class="form-control input_table" disabled type="text" name="value[3][ck_column_table]">
                            </td>
                            <td><button type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                    </table>
                    <table class="col-lg-10 col-lg-offset-1">
                        <tr>
                            <td></td>
                            <td>
                                API <input type="checkbox" name="api" value="api"> 
                                Criteria <input type="checkbox" name="criteria" value="criteria"> 
                            </td>
                            <td>
                                <button type="button" class="btn btn-default" id="btn_add_field">Add</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script>
var index = 4;
function addField() {
    $('#btn_add_field').unbind('click').click(function (e) {
        var html = '';
        html += '<tr>';
        html += '<td>Colum3</td>';
        html += '<td>';
        html += "<input class='form-control required1' type='text' name='value[" + index + "][column]'>";
        html += '</td>';
        html += '<td>';
        html += "Required <input type='checkbox' name='value[" + index + "][ck_column][]' value='required'>";
        html += "Unique <input type='checkbox' class='unique' name='value[" + index + "][ck_column][]' value='unique'>";
        html += '</td>';
        html += '<td>Name column</td>';
        html += "<td><input class='form-control input_column' disabled type='text' name='value[" + index + "][ck_column_column]'> </td>";
        html += '<td> Name table</td>';
        html += '<td>';
        html += "<input class='form-control input_table' disabled type='text' name='value[" + index + "][ck_column_table]'>";
        html += '</td>';
        html += '<td><button type="button" class="btn btn-danger">Delete</button></td>';
        html += '</tr>';
        $("#table-content").append(html);
        removeField();
        uniqueClick();
        index++;
        $('.required1').each(function () {
            $(this).rules('add', 'required');
        });
    });
}
function removeField() {
    $('.btn-danger').unbind('click').click(function () {
        $(this).parents('tr').remove();
        addField();
    });
}
function uniqueClick() {
    $('.unique').change(function () {
        if (this.checked) {
            $(this).parents('tr').find('.input_table').removeAttr('disabled');
            $(this).parents('tr').find('.input_column').removeAttr('disabled');
            $(this).parents('tr').find('.input_table').rules('add', 'required');
            $(this).parents('tr').find('.input_column').rules('add', 'required');
        } else {
            $(this).parents('tr').find('.input_table').attr('disabled', 'disabled');
            $(this).parents('tr').find('.input_column').attr('disabled', 'disabled');
            $(this).parents('tr').find('.input_table').rules('remove', 'required');
            $(this).parents('tr').find('.input_column').rules('remove', 'required');
        }

    });
}
$(function () {
    addField();
    removeField();
    uniqueClick();
});
    </script>
    <script>
        $(function () {
            $("#frm_crud_create").validate({
                rules: {
                    nameModel: {
                        required: true,
                    }
                }
            });
            $('.required1').each(function () {
                $(this).rules('add', 'required');
            });

        });
    </script>
</body>
</html>