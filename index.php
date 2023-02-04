<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="couponstyle.css" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.cdnfonts.com/css/proxima-nova-2" rel="stylesheet" async>
<body>
    <div id="backgroundimg"></div>
    <div id="maindiv">
    <div id="input-element">
        <img id="status-img" src="invalid.png" width="200px" height="200px">
        <form id="otherForm">
        </form>
        <div id="result-div">
        <br>
        <h3>Информация о купоне:</h3>
        <div id="coupon-info"></div>
        <h3>Принадлежит:</h3>
        <div id="user-name"></div>
        <h3>Дата выдачи:</h3>
        <div id="date"></div>
        </div>
        <div id="output_div"></div>
        <button id="delete-button" style="display:none">Использовать</button>

    </div>
    </div>

    <script>
$(document).ready(function(){
    var coupon_id = new URL(window.location.href).searchParams.get("coupon_id");
    $.ajax({
        type: "POST",
        url: "coupon.php",
        data: {coupon_id:coupon_id},
        dataType: "json",
        success: function(response){
            var coupon_info = response.coupon_info;
            var user_name = response.user_name;
            var date = response.date;
            
            if (coupon_info == undefined) {
                $("#coupon-info").html("Не найденно!")
                $("#user-name").html("Не найденно!")
                $("#date").html("Не найденно!")
            }
            if (coupon_info !== undefined) {
                $("#coupon-info").html(coupon_info + " ")
                $("#user-name").html(user_name + " ")
                $("#date").html(date + " ")
                $("#status-img").attr("src","valid.png")
                $('#delete-button').show();
            }
        }
    });

    $("#delete-button").click(function(){
        console.log("huh")
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: {coupon_id:coupon_id},
            success: function(sus){
                // Show success message
                console.log(sus)
                $("#output_div").html("Coupon successfully deleted!");
            }
        });
    });
});
</script>



</body>
</html>
