$(document).ready(function () {
  $('#editform').validate({
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      contact: {
        required: true,
        rangelength: [10, 12],
        number: true
      },
      'lang[]':{required:true},
    },
    messages: {
      name: 'Please enter Name.',
      email: {
        required: 'Please enter Email Address.',
        email: 'Please enter a valid Email Address.',
      },
      contact: {
        required: 'Please enter Contact.',
        rangelength: 'Contact should be 10 digit number.'
      },
    },
    errorPlacement: function (error, element) {
          if (element.attr("name") == "lang[]") {
              error.appendTo("#langError"); // Append the error to a custom div
          } else {
              error.insertAfter(element);
          }
      },
    submitHandler: function (form) {
      form.submit();
    }
  });
});

    $(document).ready(function () {
        $('#form').validate({
          rules: {
            name: {
              required: true
            },
            email: {
              required: true,
              email: true
            },
            contact: {
              required: true,
              rangelength: [10, 12],
              number: true
            },
            'lang[]':{required:true},
            password: {
              required: true,
              minlength: 6
            },
            password_confirmation: {
              required: true,
              equalTo: "#password"
            }
          },
          messages: {
            name: 'Please enter Name.',
            email: {
              required: 'Please enter Email Address.',
              email: 'Please enter a valid Email Address.',
            },
            contact: {
              required: 'Please enter Contact.',
              rangelength: 'Contact should be 10 digit number.'
            },
            password: {
              required: 'Please enter Password.',
              minlength: 'Password must be at least 6 characters long.',
            },
            password_confirmation: {
              required: 'Please enter Confirm Password.',
              equalTo: 'Confirm Password do not match with Password.',
            }
          },
          errorPlacement: function (error, element) {
                if (element.attr("name") == "lang[]") {
                    error.appendTo("#langError");
                } else {
                    error.insertAfter(element);
                }
            },
          submitHandler: function (form) {
            form.submit();
          }
        });
      });