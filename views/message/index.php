<!--<div class="col-md-12">-->
<div class="row p-4 list-item" >
<?php foreach ($rows as $item): ?>
    <div class="col-md-6 pt-1 form-group ">
        <div class="item position-sticky">
            <div class="message">
                <?php echo $item['content']?>
            </div>
            <div class="position-absolute bottom">
                <p class="name"><?php echo $item['fullname']?></p>
                <p class="date"><?php echo date('dS F, Y',strtotime($item['created_at'])).' at '.date('H:ia',strtotime($item['created_at']))?></p>
                <?php
                if (isset($_SESSION['user'])):
                    ?>
                    <a onclick="editMessage(<?php echo $item['id']?>)" class="position-absolute edit">
                        <i class="edit-content rounded-circle fa fa-pencil-alt"></i>
                    </a>
                    <a onclick="deleteMessage(<?php echo $item['id']?>)" class="position-absolute trash">
                        <i class="edit-content rounded-circle fa fa-trash"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<!--</div>-->
<?php
if(!empty($perpageresult)) {
    echo '<div id="pagination">' . $perpageresult . '</div>';
}
?>
<div class="clear"></div>
