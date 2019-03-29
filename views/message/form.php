<div class="modal-header">
    <h5 class="modal-title">Post Message</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="messageFrm" name="messageFrm">
        <input type="hidden" value="<?php echo $id ?? null ?>" name="id" class="txt">
        <input maxlength="20" type="text" placeholder="Please input your Name" value="<?php echo $fullname ?? null ?>" name="fullname" class="txt">
        <textarea maxlength="120" placeholder="Your Message" name="content" type="text" class="txt_3"><?php echo $content ?? null ?></textarea>
        <button type="button" class="txt2" onclick="sendMessage();"> Send</button>
    </form>
</div>