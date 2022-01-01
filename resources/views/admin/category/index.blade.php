<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <table border='1'>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
        </tr>

        @foreach($data as $key => $dt)
        <tr>
            <td>{{ $key+1 }} </td>
            <td>{{ $dt->name }} </td>
            <td>{{ $dt->image }} </td>
        </tr>
        @endforeach
        
    </table>
    
</body>
</html>