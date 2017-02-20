<!DOCTYPE html>
<html>
    <head>
        <title>Calculator</title>
        <style>
            td{
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align:center">
            <form method="POST" action="{{url('tamnx/crud/store')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <table>
                    <tr>
                        <td>Name model</td>
                        <td>
                            <input type="text" name="nameModel"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Colum1</td>
                        <td>
                            <input type="text" name="value[1][column]">
                        </td>
                        <td>  
                            Required <input type="checkbox" name="value[1][ck_column][]" value="required"> 
                            Unique <input type="checkbox" name="value[1][ck_column][]" value="unique"> 
                            Name column<input type="text" name="value[1][ck_column_column]"> 
                            Name table <input type="text" name="value[1][ck_column_table]">
                        </td>
                    </tr>
                    <tr>
                        <td>Colum2</td>
                        <td><input type="text" name="value[2][column]"></td>
                        <td>
                            Required <input type="checkbox" name="value[2][ck_column][]" value="required"> 
                            Unique <input type="checkbox" name="value[2][ck_column][]" value="unique"> 
                            Name column<input type="text" name="value[2][ck_column_column]"> 
                            Name table <input type="text" name="value[2][ck_column_table]">
                        </td>
                    </tr>
                    <tr>
                        <td>Colum3</td>
                        <td>
                            <input type="text" name="value[3][column]">
                        </td>
                        <td>
                            Required <input type="checkbox" name="value[3][ck_column][]" value="required"> 
                            Unique <input type="checkbox" name="value[3][ck_column][]" value="unique"> 
                            Name column<input type="text" name="value[3][ck_column_column]"> 
                            Name table <input type="text" name="value[3][ck_column_table]">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit">Submit</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </h1>
    </body>
</html>