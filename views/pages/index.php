<div class="container h-100 d-flex flex-column">
    <div class="row justify-content-center h-100">
        <article class="bg-white col-md-3 ">
            <div class="pl-4 pr-4 h-100 position-sticky">
                <img src="images/logo.jpg" alt="" class="logo img-fluid mx-auto d-block pb-1">
                <p class="text-center">
                    <span class="border-top pt-2">Guestbook</span>
                </p>
                <p class="text-left">
                    Feel free to leave us a short message to tell us what you think to our services
                </p>
                <button type="button" class="w-100 btn" onclick="messageModal()">Post a Message</button>
                <p class="position-absolute text-left login">
                    <?php
                    if(!isset($_SESSION['user'])):
                    ?>
                    <a onclick="loginModal()">Admin Login</a>
                    <?php else:?>
                        <a href="index.php?controller=auth&action=logout">Admin Logout</a>
                    <?php endif;?>
                </p>
            </div>
        </article>
        <article class="main-content col-md-9">
            <div class="row p-4">
                <div class="col-md-6 pt-1 form-group ">
                    <div class="item position-sticky">
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui.
                        </p>
                        <p class="name">Janie Jones</p>
                        <p class="date">21st Mar, 2017 at 09:43am</p>
                        <?php
                        if(isset($_SESSION['user'])):
                        ?>
                        <a href="#" class="position-absolute edit">
                            <i class="edit-content rounded-circle fa fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="position-absolute trash">
                            <i class="edit-content rounded-circle fa fa-trash"></i>
                        </a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
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
    function messageModal() {
        $.ajax({
            url: "index.php?controller=message&action=create",
            type: 'GET',
            cache: false,
        }).done(function (result) {
            $('#modalView').find('.modal-content').html(result)
            $('#modalView').modal('show') //part of bootstrap.min.js
        });
    }

    function loginModal() {
        $.ajax({
            url: "index.php?controller=auth",
            type: 'GET',
            cache: false,
        }).done(function (result) {
            $('#modalView').find('.modal-content').html(result)
            $('#modalView').modal('show') //part of bootstrap.min.js
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
</script>