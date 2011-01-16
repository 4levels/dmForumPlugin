<?php if (! $postDeleted): ?>
<div>
    <p><?php echo __('Are you sure, that you want to delete this post?')?></p>
    <p>
        <input class="button2" type="button" value="<?php echo __('Yes') ?>" onclick="deleteForumPostConfirm(<?php echo $postId ?>)" />
        <input class="button1" type="button" value="<?php echo __('No') ?>" onclick="location.reload()" />
    </p>
</div>

<?php endif; ?>