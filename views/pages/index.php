<div class="container h-100 d-flex flex-column main-backgroud-color">
    <div class="row justify-content-center">
        <article class="bg-white col-xl-3">
            <div class="pl-4 pr-4 position-sticky h-100">
                <img src="images/logo.jpg" alt="" class="logo img-fluid mx-auto d-block pb-1">
                <p class="text-center">
                    <span class="border-top pt-2">Guestbook</span>
                </p>
                <p class="text-left">
                    Feel free to leave us a short message to tell us what you think to our services
                </p>
                <p class="text-left">
                <button type="button" class="w-100 btn" onclick="messageModal()">Post a Message</button>
                </p>
                <p class="text-left d-xl-none">
                    <?php
                    if (!isset($_SESSION['user'])):
                        ?>
                        <a onclick="loginModal()">Admin Login</a>
                    <?php else: ?>
                        <a href="index.php?controller=auth&action=logout">Admin Logout</a>
                    <?php endif; ?>
                </p>
                <div class="clear"></div>
                <p class="position-absolute text-left login d-none d-xl-block">
                    <?php
                    if (!isset($_SESSION['user'])):
                        ?>
                        <a onclick="loginModal()">Admin Login</a>
                    <?php else: ?>
                        <a href="index.php?controller=auth&action=logout">Admin Logout</a>
                    <?php endif; ?>
                </p>
            </div>
        </article>
        <article class="main-content col-xl-9 main-backgroud-color" id="load_data">
        </article>
    </div>
</div>
<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        loadData();
    })

    function loadData(page) {
        $.ajax({
            url: "message",
            type: 'GET',
            cache: true,
            data: {
                page: page
            },
            success: function (result) {
                $("#load_data").html(result);
            },
            error: function (data) {
                toastr.error('An error occurred.');
            },
        });
    }
    function deleteMessage(id) {
        var check = confirm("Are you sure!");
        if (check == true) {
            $.ajax({
                url: "message&action=delete",
                type: 'GET',
                cache: false,
                data : {
                    'id' : id
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.code === 200) {
                        toastr.success(data.message);
                        loadData();
                        $('#modalView').modal('hide');
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function (data) {
                    toastr.error('An error occurred.');
                },
            });
        }
    }
    function editMessage(id) {
        $.ajax({
            url: "message&action=view",
            type: 'GET',
            cache: false,
            data : {
                'id' : id
            },
            success: function (result) {
                $('#modalView').find('.modal-content').html(result)
                $('#modalView').modal('show')
            },
            error: function (data) {
                toastr.error('An error occurred.');
            },
        });
    }
    function messageModal() {
        $.ajax({
            url: "message&action=create",
            type: 'GET',
            cache: false,
            success: function (result) {
                $('#modalView').find('.modal-content').html(result)
                $('#modalView').modal('show')
            },
            error: function (data) {
                toastr.error('An error occurred.');
            },
        });
    }

    function loginModal() {
        $.ajax({
            url: "auth",
            type: 'GET',
            cache: false,
            success: function (result) {
                $('#modalView').find('.modal-content').html(result)
                $('#modalView').modal('show')
            },
            error: function (data) {
                toastr.error('An error occurred.');
            },
        });
    }

    function login() {
        var username = document.forms["loginFrm"]["username"].value;
        if (username == "") {
            toastr.error('Username must be filled out');
            document.forms["loginFrm"]["username"].focus();
            return false;
        }

        var password = document.forms["loginFrm"]["password"].value;
        if (password == "") {
            toastr.error('Password must be filled out');
            document.forms["loginFrm"]["password"].focus();
            return false;
        }
        $.ajax({
            type: 'post',
            url: 'auth?action=login',
            data: $('#loginFrm').serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (data.code === 200) {
                    toastr.success(data.message);
                    location.reload();
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (data) {
                toastr.error('An error occurred.');
            },
        });
    }

    function sendMessage() {
        var fullname = document.forms["messageFrm"]["fullname"].value;
        if (fullname == "") {
            toastr.error('Name must be filled out');
            document.forms["messageFrm"]["fullname"].focus();
            return false;
        }

        var content = document.forms["messageFrm"]["content"].value;
        if (content == "") {
            toastr.error('Content message must be filled out');
            document.forms["messageFrm"]["content"].focus();
            return false;
        }
        $.ajax({
            type: 'post',
            url: 'message?action=save',
            data: $('#messageFrm').serialize(),
            success: function (data) {
                data = JSON.parse(data);
                if (data.code === 200) {
                    toastr.success(data.message);
                    loadData();
                    $('#modalView').modal('hide');
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (data) {
                toastr.error('An error occurred.');
            },
        });
    }
</script>