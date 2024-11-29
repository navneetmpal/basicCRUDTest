<!DOCTYPE html>
<html>
<head>
<title>Multi-Step Form with Previous Button</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Step 1 -->
<div id="step1">
    <input type="text" id="name" placeholder="Name">
    <button id="next1">Next</button>
</div>

<!-- Step 2 -->
<div id="step2" style="display:none;">
    <input type="email" id="email" placeholder="Email">
    <button id="prev2">Previous</button>
    <button id="next2">Next</button>
</div>

<!-- Step 3 -->
<div id="step3" style="display:none;">
    <input type="password" id="password" placeholder="Password">
    <button id="prev3">Previous</button>
    <button id="next3">Next</button>
</div>

<!-- Step 4 -->
<div id="step4" style="display:none;">
    <input type="text" id="number" placeholder="number">
    <button id="prev4">Previous</button>
    <button id="submit">Submit</button>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to store data in localStorage (persistent for one year)
    function storeDataInLocalStorage(key, value) {
        localStorage.setItem(key, value);
        let now = new Date();
        let expiry = new Date(now.getTime() + (365 * 24 * 60 * 60 * 1000)); // 1 year expiry
        localStorage.setItem(key + '_expiry', expiry);
    }

    function retrieveDataFromLocalStorage(key, selector) {
        let value = localStorage.getItem(key);
        if (value) {
            $(selector).val(value); // Set the stored value in the input field
        }
    }


    // Check if localStorage data is expired
    function isExpired(key) {
        let expiry = localStorage.getItem(key + '_expiry');
        if (!expiry) return true;
        return new Date(expiry) < new Date();
    }

    // Clear expired data
    function clearIfExpired(key) {
        if (isExpired(key)) {
            localStorage.removeItem(key);
            localStorage.removeItem(key + '_expiry');
        }
    }

    // Step 1: Store Name
    $('#next1').on('click', function() {
        let name = $('#name').val();
        storeDataInLocalStorage('name', name);
        $('#step1').hide();
        $('#step2').show();
    });

    // Step 2: Store Email
    $('#next2').on('click', function() {
        let email = $('#email').val();
        storeDataInLocalStorage('email', email);
        $('#step2').hide();
        $('#step3').show();
    });

    $('#prev2').on('click', function() {
        $('#step2').hide();
        $('#step1').show();
    });

    // Step 3: Store Password
    $('#next3').on('click', function() {
        let password = $('#password').val();
        storeDataInLocalStorage('password', password);
        $('#step3').hide();
        $('#step4').show();
    });

    $('#prev3').on('click', function() {
        $('#step3').hide();
        $('#step2').show();
    });

    // Step 4: Final Step Submit
    $('#submit').on('click', function() {
        let name = localStorage.getItem('name');
        let email = localStorage.getItem('email');
        let password = localStorage.getItem('password');
        let number = $('#number').val();

        $.ajax({
            url: '/finalSubmit',
            method: 'POST',
            data: {
                name: name,
                email: email,
                password: password,
                number: number,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('Data submitted successfully');
                localStorage.clear(); // Clear stored data after submission
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });

    $('#prev4').on('click', function() {
        $('#step4').hide();
        $('#step3').show();
    });

    // Resume from where user left off
    $(document).ready(function() {
        if (localStorage.getItem('name')) {
            $('#step1').hide();
            $('#step2').show();
            retrieveDataFromLocalStorage('name', '#name'); // Set the name field
        }
        if (localStorage.getItem('email')) {
            $('#step2').hide();
            $('#step3').show();
            retrieveDataFromLocalStorage('email', '#email'); // Set the email field
        }
        if (localStorage.getItem('password')) {
            $('#step3').hide();
            $('#step4').show();
            retrieveDataFromLocalStorage('password', '#password'); // Set the password field
        }
    });

</script>
</html>
