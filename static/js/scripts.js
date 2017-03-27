$(document).ready(function(){
    $("#user-info").click(function(){
        $("#user-visits").toggle();
    });
});

// function getRefreshedFeed() {
//
//     $.ajax({
//         url: "views/rsscontent.php",
//         data: $('#panel').serialize(),
//         type: "POST",
//         success:function(html){$('#content');}
//     });
// }

// $(function(){
//     getRefreshedFeed();
//     var int = setInterval('getRefreshedFeed()', 25000);
// });

$(document).ready(function() {
    $("#to-register").click(function() {
        $("#login-modal").modal("toggle");
    });
});

$(document).ready(function() {
    $("#to-login").click(function() {
        $("#register-modal").modal("toggle");
    });
});

//
// $(document).ready(function() {
//     $("#register").click(function() {
//     var name = $("#name").val();
//     var email = $("#email").val();
//     var password = $("#password").val();
//     var password2 = $("password2").val();
//     if (name == '' || email == '' || password == '' || password2 == '') {
//     alert("Please fill all fields...!!!!!!");
// }  else if (!(password).match(password2)) {
//             alert("Your passwords don't match. Try again?");
//                 }
//     });
// });
// $.post('controller/inputController.php', $('#panel').serialize());

// function sendFeedInput(){
//     var number = document.getElementById("number").value;
//     var message;
//
//     if (isNaN(number) || number < 1 || number > 15) {
//         message = "Number of items must be between 1 and 15";
//     } else {
//         message = "OK.. validating feed url.";
//         $.get('controller/gethandler.php' + $('#feedinput').serialize())
//         //  window.location = window.location;
//
//     }
//     document.getElementById("message").innerHTML = message;
//
// }
