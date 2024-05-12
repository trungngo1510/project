<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<form  method ="post" >
    
      @csrf
        <label for="">tên cầu thủ</label><br>
        <input type="text" name="name" id="" value="{{ $player[0]->name}}"><br>
       
        <label for="">Tuổi</label><br>
        <input type="text" name="age" id="" value="{{$player[0]->age}}"><br>
       
        <label for="">Quốc Tịnh</label><br> 
        <input type="text" name="national" id=""value="{{$player[0]->national}} "><br>
       
        <label for="">Vị trí</label><br>
        <input type="text" name="position" id=""value="{{ $player[0]->position}}"><br>
       
        <label for="">Lương</label><br>
        <input type="text" name="salary" id=""value=" {{$player[0]->salary}}"><br>
   
        <button type="submit">Update cầu thủ</button>
      
  </form>
  
  <!-- <a href="{{ url('index1') }}"><button id="button">quay lại trang chủ</button></a>   -->
</body>
</html>

