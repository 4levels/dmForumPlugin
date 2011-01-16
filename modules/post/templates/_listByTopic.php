<?php // Vars: $postPager, $topic

use_helper('Date');

$root_dir = $sf_request->getRelativeUrlRoot();

echo $postPager->renderNavigationTop();

$row_class = 'bg1';
?>
<h3 class="topictitle"><?php echo $topic->title ?></h3>
<p><input class="button1 reply-button" type="button" onclick="addPost(<?php echo $topic->id ?>)" id="add_post" value="<?php echo __('Reply') ?>" /></p>
<div id="new_post_form"></div>
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
                            <a href="#" onclick="approveForumPost(<?php echo $post->id ?>, 'ask'); return false;">
                                <img alt="<?php echo __('Unapproved') ?>" src="<?php echo $root_dir?>/dmForumPlugin/images/icons/icon_topic_unapproved.gif" />
                            </a>
                        <?php endif; ?>
                        <dfn class="first"><?php echo (empty($post->title) ? $post->Topic->title : $post->title) ?>
                            <span class="author"><?php echo __('by') ?> <?php echo _link($post->User)->set('.username') ?> &raquo; <?php echo format_datetime($post->created_at) ?></span>
                            <input class="button2 edit-button" type="button" value="<?php echo __('Delete post')?>" onclick="deleteForumPost(<?php echo $post->id ?>)" />
                            <input class="button2 delete-button" type="button" value="<?php echo __('Edit post')?>" onclick="editForumPost(<?php echo $post->id ?>)" />
                        </dfn>
                    </dt>
                    <dd id="post-content-<?php echo $post->id ?>"class="content"><?php echo $post->content ?></dd>
		</dl>
            </li>
            <?php endif; endforeach; ?>
        </ul>
	<span class="corners-bottom"><span></span></span>
    </div>
</div>

<?php echo $postPager->renderNavigationBottom(); ?>