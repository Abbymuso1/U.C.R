$(function() {

    // Checking for CSS 3D transformation support
    $.support.css3d = supportsCSS3D();

    var w3ls_form = $('#w3ls_form');

    // Listening for clicks on the ribbon links
    $('.flipLink').click(function(e) {

        // Flipping the forms
        w3ls_form.toggleClass('flipped');

        // If there is no CSS3 3D support, simply
        // hide the sign in form (exposing the signup one)
        if (!$.support.css3d) {
            $('#gpa').toggle();
        }
        e.preventDefault();
    });


    // A helper function that checks for the 
    // support of the 3D CSS3 transformations.
    function supportsCSS3D() {
        var props = [
                'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
            ],
            testDom = document.createElement('a');

        for (var i = 0; i < props.length; i++) {
            if (props[i] in testDom.style) {
                return true;
            }
        }

        return false;
    }
    $("#email_error_message").hide();
    $("#pass_error_message").hide();
    $("#name_error_message").hide();
    $("#email_error_message1").hide();
    $("#phone_error_message").hide();
    $("#pass_error_message1").hide();
    $("#option_error_message").hide();
    $("#option_error_message2").hide();
    $("#option_error_message3").hide();
    $("#option_error_message4").hide();
    $("#option_error_message5").hide();
    $("#option_error_message7").hide();
    $("#option_error_message8").hide();
    $("#option_error_message9").hide();
    $("#option_error_message10").hide();


    $("#option1_error_message").hide();
    $("#option2_error_message").hide();
    $("#option3_error_message").hide();
    $("#option4_error_message").hide();
    $("#option5_error_message").hide();
    $("#option6_error_message").hide();

    var error_name = false;
    var error_email = false;
    var error_email1 = false;
    var error_phone = false;
    var error_pass = false;
    var error_pass1 = false;
    var error_option = false;
    var error_option2 = false;
    var error_option3 = false;
    var error_option3 = false;
    var error_option4 = false;
    var error_option5 = false;
    var error_option6 = false;
    var error_option7 = false;
    var error_option8 = false;
    var error_option_1 = false;
    var error_option_2 = false;
    var error_option_3 = false;
    var error_option_4 = false;
    var error_option_5 = false;
    var error_option_6 = false;


    $("#username").focusout(function() {
        check_name();
    });
    $("#userphone").focusout(function() {
        check_phone();
    });
    $("#email1").focusout(function() {
        check_email1();
    });
    $("#email").focusout(function() {
        check_email();
    });
    $("#password").focusout(function() {
        check_pass();
    });

    $("#password1").focusout(function() {
        check_pass1();
    });

    $("#option").focusout(function() {
        check_option();
    });

    $("#option2").focusout(function() {
        check_option2();
    });

    $("#option3").focusout(function() {
        check_option3();
    });

    $("#option4").focusout(function() {
        check_option4();
    });

    $("#option5").focusout(function() {
        check_option5();
    });
    $("#option6").focusout(function() {
        check_option6();
    });
    $("#option7").focusout(function() {
        check_option7();
    });
    $("#option8").focusout(function() {
        check_option8();
    });
    $("#option9").focusout(function() {
        check_option9();
    });
    $("#option10").focusout(function() {
        check_option10();
    });

    $("#option_1").focusout(function() {
        check_option_1();
    });

    $("#option_2").focusout(function() {
        check_option_2();
    });
    $("#option_3").focusout(function() {
        check_option_3();
    });
    $("#option_4").focusout(function() {
        check_option_4();
    });
    $("#option_5").focusout(function() {
        check_option_5();
    });
    $("#option_6").focusout(function() {
        check_option_6();
    });

    function check_pass() {
        var pass_l = $("#password").val();
        if (pass_l < 4) {
            $("#pass_error_message").html("Atleast 8 characters");
            $("#pass_error_message").css("color", "red");
            $("#pass_error_message").show();
            error_pass = true;
        } else {
            $("#pass_error_message").hide();
            $("#password").css("border-bottom", "3px solid green ");
            // $("#password").css("border-bottom-right-radius", "12px");
        }
    }

    function check_pass1() {
        var pass_l = $("#password1").val();
        if (pass_l < 4) {
            $("#pass_error_message1").html("Atleast 8 characters");
            $("#pass_error_message1").css("color", "red");

            $("#pass_error_message1").show();
            error_pass1 = true;
        } else {
            $("#pass_error_message1").hide();
            $("#password1").css("border-bottom", "3px solid orange");
            $("#password1").css("border-bottom-right-radius", "12px");
        }
    }

    function check_name() {
        var pattern = /^[a-zA-Z]*$/;
        var name = $("#username").val();
        if (pattern.test(name) && name !== '') {
            $("#name_error_message").hide();
            $("#username").css("border-bottom", "3px solid green");
            $("#username").css("border-bottom", "12px");
        } else {
            $("#name_error_message").show();
            $("#name_error_message").html("Should only contain characters");
            $("#name_error_message").css("color", "red");

        }
    }

    function check_phone() {
        var pass_l = $("#userphone").val();
        if (pass_l < 2) {
            $("#phone_error_message").html("Contains only numerals");
            $("#phone_error_message").css("color", "red");

            $("#phone_error_message").show();
            error_phone = true;
        } else {
            $("#phone_error_message").hide();
            $("#userphone").css("border-bottom", "3px solid green");
            $("#userphone").css("border-bottom", "12px");
        }
    }

    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#email").val();
        if (pattern.test(email) && (email) !== '') {
            $("#email_error_message").hide();
            $("#email").css("border-bottom", "4px solid green ");
            // $("#email").css("border-bottom-right-radius", "12px");
        } else {
            $("#email_error_message").html("Invalid email");
            $("#email_error_message").css("color", "red");
            $("#email_error_message").show();
            error_email = true;
        }
    }

    function check_email1() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#email1").val();
        if (pattern.test(email) && (email) !== '') {
            $("#email_error_message1").hide();
            $("#email1").css("border-bottom", "3px solid green");
            $("#email1").css("border-bottom", "12px");
        } else {
            $("#email_error_message1").html("Invalid email");
            $("#email_error_message1").css("color", "red");

            $("#email_error_message1").show();
            error_email1 = true;
        }
    }

    function check_option() {

        var opt = $("#option").val();
        if (opt) {
            $("#option_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message").html("Select a gender");
            $("#option_error_message").css("color", "red");

            $("#option_error_message").show();
            error_option = true;
        }
    }

    function check_option2() {

        var opt = $("#option2").val();
        if (opt) {
            $("#option_error_message2").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message2").html("Select a grade");
            $("#option_error_message2").css("color", "red");

            $("#option_error_message2").show();
            error_option2 = true;
        }
    }

    function check_option3() {

        var opt = $("#option3").val();
        if (opt) {
            $("#option_error_message3").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message3").html("Select a grade");
            $("#option_error_message3").css("color", "red");

            $("#option_error_message3").show();
            error_option3 = true;
        }
    }

    function check_option4() {

        var opt = $("#option4").val();
        if (opt) {
            $("#option_error_message4").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message4").html("Select a grade");
            $("#option_error_message4").css("color", "red");

            $("#option_error_message4").show();
            error_option4 = true;
        }
    }


    function check_option5() {

        var opt = $("#option5").val();
        if (opt) {
            $("#option_error_message5").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message5").html("(Required)");
            $("#option_error_message5").css("color", "red");

            $("#option_error_message5").show();
            error_option5 = true;
        }
    }


    function check_option6() {

        var opt = $("#option6").val();
        if (opt) {
            $("#option_error_message6").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message6").html("(Required)");
            $("#option_error_message6").css("color", "red");

            $("#option_error_message6").show();
            error_option6 = true;
        }
    }

    function check_option7() {

        var opt = $("#option7").val();
        if (opt) {
            $("#option_error_message7").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option_error_message7").html("(Required)");
            $("#option_error_message7").css("color", "red");

            $("#option_error_message7").show();
            error_option7 = true;
        }
    }

    function check_option_1() {

        var opt = $("#option_1").val();
        if (opt) {
            $("#option1_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option1_error_message").html("(Fill in option)");
            $("#option1_error_message").css("color", "red");

            $("#option1_error_message").show();
            error_option_1 = true;
        }
    }

    function check_option_2() {

        var opt = $("#option_2").val();
        if (opt) {
            $("#option2_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option2_error_message").html("(Fill in option)");
            $("#option2_error_message").css("color", "red");

            $("#option2_error_message").show();
            error_option_2 = true;
        }
    }

    function check_option_3() {

        var opt = $("#option_3").val();
        if (opt) {
            $("#option3_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option3_error_message").html("(Fill in option)");
            $("#option3_error_message").css("color", "red");

            $("#option3_error_message").show();
            error_option_3 = true;
        }
    }

    function check_option_4() {

        var opt = $("#option_4").val();
        if (opt) {
            $("#option4_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option4_error_message").html("(Fill in option)");
            $("#option4_error_message").css("color", "red");

            $("#option4_error_message").show();
            error_option_4 = true;
        }
    }


    function check_option_5() {

        var opt = $("#option_5").val();
        if (opt) {
            $("#option5_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option5_error_message").html("(Fill in option)");
            $("#option5_error_message").css("color", "red");

            $("#option5_error_message").show();
            error_option_5 = true;
        }
    }


    function check_option_6() {

        var opt = $("#option_6").val();
        if (opt) {
            $("#option6_error_message").hide();
            // $("#email1").css("border-bottom", "3px solid green");
            // $("#email1").css("border-bottom", "12px");
        } else {
            $("#option6_error_message").html("(Fill in option)");
            $("#option6_error_message").css("color", "red");

            $("#option6_error_message").show();
            error_option_6 = true;
        }
    }
});