<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
            table{
                width: 800px;
                margin: auto;
                text-align: center;
            }
            tr {
                border: 1px solid;
            }
            th {
                border: 1px solid;
            }
            td {
                border: 1px solid;
            }
            h1{
                text-align: center;
                color: red;
            }
            #button{
                margin: 2px;
                margin-right: 10px;
                float: right;
            }
        </style>
<body>

<table id="datatable" style="border: 1px solid">
            <h1>Quản lý cầu thủ</h1>
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>Tên cầu thủ</th>
                    <th>Tuổi</th>
                    <th>Quốc tịch</th>
                    <th>Vị trí</th>
                    <th>Lương</th>
                    <th style="width: 7%;">Edit</th>
                    <th style="width: 10%;">Delete</th>
                </tr>
            </thead>
            <tbody>
        @foreach($player as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->age}}</td>
            <td>{{$row->national}}</td>
            <td>{{$row->position}}</td>
            <td>{{$row->salary}}</td>
            <td><a href="{{url('/edit/'.$row->id) }}">Edit</a></td>
            <td>
               
                <a href="/delete/{{$row->id}}">Delete</a>
               
            </td>
        </tr>
        @endforeach
       
    </tbody>
    <tfoot>
                <tr>
                    <td colspan="8">
                    <a href="{{url('insert_player')}}"><button id="button">Thêm cầu thủ</button></a>
                    </td>
                </tr>
     </tfoot>
    

</table>       
</body>
</html>