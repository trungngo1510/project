<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  method="post">
@csrf
        <label for="">tên cầu thủ</label><br>
        <input type="text" name="name" id="" value=""><br>
       
        <label for="">Tuổi</label><br>
        <input type="text" name="age" id=""><br>
       
        <label for="">Quốc Tịnh</label><br>
        <input type="text" name="national" id=""><br>
       
        <label for="">Vị trí</label><br>
        <input type="text" name="position" id=""><br>
       
        <label for="">Lương</label><br>
        <input type="text" name="salary" id=""><br>
        
        <button type="submit">thêm cầu thủ</button>
           
  </form>
</body>
</html>