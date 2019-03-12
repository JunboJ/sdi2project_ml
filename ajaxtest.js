$(document).ready(function(){
    $("button").click(function(){
        $.get("test.txt", function(data, status){
            $("#test").html(data);
            alert(status);
        });
    });
});