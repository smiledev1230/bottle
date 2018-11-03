function load_preview_modal(url) {

    $(".preview-bottle").load(url);

}

$("#select-all-admin").on("click", function () {

    var fields = $(".admin-checkbox");

    if ($(this).is(":checked")) {



        $.each(fields, function (key, val) {

            $(val).prop('checked', true);

        });

    }

    else {

        $.each(fields, function (key, val) {

            $(val).prop('checked', false);;

        });

    }

});

$("#send-message").on("click", function () {

    var fields = $(".admin-checkbox");

    var users = new Array();

    $.each(fields, function (key, field) {

        if ($(field).is(":checked")) {

            var id = $(field).attr('id');

            users.push(id);

        }

    });



    if (users.length == 0) {

        toastr["error"]("Please select at least one admin to send message", "Error");

        return false;

    }



    var subject = $("#subject").val();

    var message = $("#message").val();

    var id = $("#id").val();



    if (subject.length == 0) {

        $("#subject").focus();

        toastr["error"]("Please enter the subject", "Error")

        return false;

    }

    if (message.length == 0) {

        $("#message").focus();

        toastr["error"]("Please enter the message send", "Error")

        return false;

    }



    $.ajax({

        url: base_url + 'image/send_message_to_admin',

        method: 'post',

        data: {

            subject: subject,

            message: message,

            users: users,

            image_id: id

        },

        dataType: 'json',

        success: function (data) {

            console.log(data);

            toastr["success"]("Message has been sent to the selected admins.", "Success")

            Custombox.close();

        }

    })

});



$(".submit-and-download").on("click", function () {

    var id = $("#download_id").val();

    var name = $("#name").val();

    var email = $("#email").val();

    var used_for = $("#used_for").val();

    if (name.length == 0) {

        $("#name").focus();

        toastr["error"]("Please enter your name", "Error")

        return false;

    }

    if (email.length == 0) {

        $("#email").focus();

        toastr["error"]("Please enter your email address", "Error")

        return false;

    }

    if (used_for.length == 0) {

        $("#used_for").focus();

        toastr["error"]("Please tell us how do you want to use this?", "Error")

        return false;

    }



    $.ajax({

        url: base_url + 'home/download_request',

        method: 'post',

        data: {

            name: name,

            email: email,

            used_for: used_for,

            id: id

        },

        dataType: 'json',

        success: function (data) {

            window.location.replace(base_url + 'home/download_image/' + id);

            Custombox.close();



        }





    });



})

$(".download-btn").on("click", function () {

    var id = $(this).data('id');

    $("#download_id").val(id);

});
$("#non_confidential_other_meetings").on("click", function () {
    if ($(this).is(":checked")) {
        $("#non_confidential_other_meetings_info").show();
    }
    else {
        $("#non_confidential_other_meetings_info").hide();
    }
});

$("#confidential_other_meetings").on("click", function () {
    if ($(this).is(":checked")) {
        $("#confidential_other_meetings_info").show();
    }
    else {
        $("#confidential_other_meetings_info").hide();
    }
});