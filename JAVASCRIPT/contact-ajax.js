$(document).ready(function () {
    $("#contact-submit-btn").click(function (e) {
        // console.log(e);
        e.preventDefault();

        // get the error message container
        var errorNameMessageContainer = document.querySelector(".name-error-msg");
        var errorEmailMessageContainer = document.querySelector(".email-error-msg");
        var errorSubjectMessageContainer = document.querySelector(".subject-error-msg");
        var errorPhoneMessageContainer = document.querySelector(".phone-error-msg");
        var errorAreaMessageContainer = document.querySelector(".message-error-msg");

        var errorFormMessageContainer = document.querySelector(".form-error-msg");

        // get the values from the form
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var phone = $("#phone").val();
        var message = $("#message").val();



        // validation variables
        nameValidation = "/^[a-zA-Z ]+$/";
        emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        numberValidation = "/^([0-9]+)$/";




        // validate the data
        if (name !== "" || email !== "" || subject !== "" || phone !== "" || message !== "") {

            // it will be empty by default
            errorFormMessageContainer.innerHTML = "";

            if (name !== '') {

                if (!(name.match(/^[a-zA-Z ]+$/))) {
                    errorNameMessageContainer.innerHTML = "Please Enter a valid Name";

                } else {
                    errorNameMessageContainer.innerHTML = "";

                    if (email !== '') {

                        // check for the email
                        if (!(email.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/))) {
                            errorEmailMessageContainer.innerHTML = "Please Enter a valid Email";
                        } else {
                            errorEmailMessageContainer.innerHTML = "";

                            if (subject !== "") {
                                // check for the suject
                                if (!(subject.match(/^[a-zA-Z ]+$/))) {

                                    errorSubjectMessageContainer.innerHTML = "Please Enter a valid subject";

                                } else {
                                    errorSubjectMessageContainer.innerHTML = "";

                                    if (phone !== "") {

                                        // check for the phone
                                        if (!(phone.match(/^([0-9]+)$/))) {
                                            errorPhoneMessageContainer.innerHTML = "Please Enter a valid Phone Number";

                                        } else {
                                            errorPhoneMessageContainer.innerHTML = "";

                                            if (message !== "") {

                                                // create a java script object
                                                mydata = {
                                                    name: name,
                                                    email: email,
                                                    subject: subject,
                                                    phone: phone,
                                                    message: message
                                                }

                                                console.log(mydata);

                                                // sending data through ajax
                                                $.ajax({
                                                    url: "php/contact.php",
                                                    type: "POST",
                                                    data: JSON.stringify(mydata),

                                                    success: function (data) {

                                                        if (data !== "") {

                                                            $("#contact-form")[0].reset();
                                                            errorFormMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:green;'>" + data + "</div>";

                                                        } else {
                                                            errorFormMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>The data sent from server is empty.</div>";

                                                        }
                                                    }

                                                });



                                            } else {
                                                errorAreaMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>Please Fill this field.</div>";

                                            }

                                        }

                                    } else {
                                        errorPhoneMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>Please Fill this field.</div>";
                                    }


                                }

                            } else {
                                errorSubjectMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>Please Fill this field.</div>";

                            }

                        }

                    } else {
                        errorEmailMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>Please Fill this field.</div>";

                    }

                }
            } else {
                errorNameMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>Please Fill this field.</div>";
            }

        }
        else {
            errorFormMessageContainer.innerHTML = "<div class='form-error-msg px-1 py-1' style='border-radius: 5px; ; color:red;'>Please Fill in All the fields.</div>";

        }

    })
});