<?php // Vars: $postPager

use_helper('Date');

$root_dir = $sf_request->getRelativeUrlRoot();

echo $postPager->renderNavigationTop();

$row_class = 'bg1';
?>

<div class="forumbg">
    <div class="inner"><span class="corners-top"><span></span></span>
        <ul class="posts">
            <?php
            foreach ($postPager as $post):
            if($post->is_active):
            ?>
            <li class="row <?php echo $row_class ?> post">
                <dl class="post">
                    <dt title="<?php echo $post ?>">
                        <?php if (! $post->is_approved): ?>
                            <a href="{postrow.U_MCP_QUEUE}"><img alt="<?php echo __('Unapproved') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_topic_unapproved.gif" /></a>
                        <?php endif; ?>
                        <dfn class="first"><?php echo $post->title ?>
                            <span class="author"><?php echo __('by') ?> <?php echo _link($post->User)->set('.username') ?> &raquo; <?php echo format_datetime($post->created_at) ?></span>
                        </dfn>
                    </dt>
                    <dd class="content"><?php echo $post->content ?></dd>
		</dl>
            </li>
            <?php endif; endforeach; ?>
        </ul>
	<span class="corners-bottom"><span></span></span>
    </div>
</div>

<?php echo $postPager->renderNavigationBottom(); ?>