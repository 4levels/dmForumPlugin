<?php if (! $postApproved): ?>
<div>
    <p><?php echo __('Please choose what you like to do with this post:')?></p>
    <p>
        <input class="button2" type="button" value="<?php echo __('Approve') ?>" onclick="approveForumPost(<?php echo $postId ?>, 'approve')" />
        <input class="button1" type="button" value="<?php echo __('Delete') ?>" onclick="approveForumPost(<?php echo $postId ?>, 'forbid')" />
    </p>
</div>

<?php endif; ?>