<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $("#addtolist").click(function(){
        $.get("addtoList.php",funtion(status){
            alert (status);
        });
    });
});
    </script>

</head>
<body>
    <button id="addtolist">click</button>
    <p id="test"></p>

</body>
</html>