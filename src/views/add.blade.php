<!DOCTYPE html>
<html>
    <head>
        <title>Calculator</title>
    </head>
    <body>
        <h1 style="text-align:center">
            <form method="POST" action="{{url('tamnx/crud/store')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="text" name="name"/>
                <br/>
                <input type="text" name="column1">
                <br/>
                <input type="checkbox" name="ck_column1[]"> 
                <input type="checkbox" name="ck_column1[]"> 
                <input type="text" name="ck_column1_column"> 
                <input type="text" name="ck_column1_table"> 
                <br/>
                <input type="text" name="column2">
                <br/>
                <input type="checkbox" name="ck_column2[]"> 
                <input type="checkbox" name="ck_column2[]"> 
                <input type="text" name="ck_column2_column"> 
                <input type="text" name="ck_column2_table"> 
                <br/>
                <input type="text" name="column1">
                <br/>
                <input type="checkbox" name="ck_column3[]"> 
                <input type="checkbox" name="ck_column3[]"> 
                <input type="text" name="ck_column3_column"> 
                <input type="text" name="ck_column3_table"> 
                <br/>
                <button type="submit">Submit</button>
            </form>
        </h1>
    </body>
</html>