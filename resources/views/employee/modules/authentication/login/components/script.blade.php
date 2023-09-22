<script>

    var LoginButton = $('#LoginButton');
    var emailInput = $('#email');
    var passwordInput = $('#password');


    var authUserId = parseInt(localStorage.getItem('authUserId'));
    var authUserName = localStorage.getItem('authUserName');
    var authUserEmail = localStorage.getItem('authUserEmail');
    var authUserToken = localStorage.getItem('authUserToken');

    function checkLogin() {
        if (
            authUserId && authUserName && authUserEmail && authUserToken
        ) {
            window.location.href = '{{ route('employee.dashboard.index') }}';
        }
    }

    checkLogin();


    function login() {
        var email = emailInput.val();
        var password = passwordInput.val();

        if (!email) {
            toastr.warning('Lütfen email adresinizi giriniz');
        } else if (!password) {
            toastr.warning('Lütfen şifrenizi giriniz');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('api.employee.authentication.login') }}',
                headers: {
                    'Accept': 'application/json',

                },
                data: {
                    email: email,
                    password: password,
                },
                success: function (response) {
                    console.log(response);
                    localStorage.setItem('authUserId', response.response.id);
                    localStorage.setItem('authUserName', response.response.name);
                    localStorage.setItem('authUserEmail', response.response.email);
                    localStorage.setItem('authUserToken', response.response.token);
                    window.location.href = '{{ route('employee.dashboard.index') }}';

                },
                error: function (error) {
                    console.log(error);
                    if (parseInt(error.status) === 422) {
                        $.each(error.responseJSON.response, function (i, error) {
                            toastr.error(error[0]);
                        });
                    } else {
                        toastr.error(error.responseJSON.message);
                    }
                }
            });
        }
    }

    emailInput.on('keyup', function (e) {
        if (e.keyCode === 13) {
            passwordInput.focus();
        }
    });

    passwordInput.on('keyup', function (e) {
        if (e.keyCode === 13) {
            login.focus();
        }
    });

    LoginButton.click(function () {
        login();
    });

</script>
