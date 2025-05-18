$(function() {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.form-message');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		console.log(formData);

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			$('#contact-form input,#contact-form textarea').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});

});



// my own code

// $(document).ready(function() {

// 	$("#contact-submit-btn").click(function(e) {
// 		console.log(e);

// 		// name = $("#name").val();
// 		// email = $("#email").val();
// 		// subject = $("#subject").val();
// 		// phone = $("#phone").val();
// 		// message = $("#message").val();

// 		// console.log(name, email, subject, phone, message);



// 		$("#contact-form").validate({
// 			rules: {
// 				name: {
// 					required: true,
// 					minlength: 3
// 				},

// 				email: {
// 					email: true,
// 					required: true
// 				},

// 				subject: "required",

// 				phone: {
// 					required: true,
// 					minlength: 10,
// 					depends: number
// 				},

// 				message: "required",

// 			},

// 			messages: {
// 				name: {
// 					required: "Please Enter a Valid name",
// 					minlength: "Name must be greater than 2 letters."
// 				},

// 				email: {
// 					email: "Enter Valid Email!",
// 					required: "Please Your Email!"
// 				},
// 				subject: {
// 					required: "Please Enter a subject."
// 				},
// 				phone: {
// 					minlength: "Please enter Valid Mobile No.",
// 					required: "Please enter Mobile No."
// 				},
// 				message: {
// 					required: "Please Enter a message."
// 				}
// 			},

// 			submitHandler: function(form) {
// 				// console.log(form);


// 				console.log(form.name, form.email, form.subject, form.phone, form.message);

// 				// using ajax to submit the data
// 				$.ajax({
// 					url: "contact.php",
// 					type: "POST",
// 					data: $(form).serialize(),
					
// 					sucess: function (data) { 
// 						console.log(data);
// 					}
// 				});

// 			}
// 		});

// 	});

// });
