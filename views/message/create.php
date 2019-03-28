<div class="modal-header">
    <h5 class="modal-title">Post Message</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form action="contact_send_mail.php" method="post" id="messageFrm" name="messageFrm">
        <input type="text" placeholder="Please input your Name" value="" name="name" class="txt">

        <textarea placeholder="Your Message" name="message" type="text" class="txt_3"></textarea>
        <button type="submit" class="txt2"> Send</button>
    </form>
</div>
<script type="text/javascript">
    var frm = $('#messageFrm');

    frm.submit(function (e) {

        e.preventDefault();
        console.log('create');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
</script>