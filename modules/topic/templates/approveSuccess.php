<?php if (! $topicApproved && ! $topicDeleted): ?>
<div>
    <p><?php echo __('Please choose what you like to do with this topic:')?></p>
    <p>
        <input class="button2" type="button" value="<?php echo __('Approve') ?>" onclick="approveForumTopic(<?php echo $topicId ?>, 'approve')" />
        <input class="button1" type="button" value="<?php echo __('Delete') ?>" onclick="approveForumTopic(<?php echo $topicId ?>, 'forbid')" />
    </p>
</div>

<?php endif; ?>