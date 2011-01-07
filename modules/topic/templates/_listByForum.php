<?php
// Vars: $topicPager, $forum
use_helper('Date');
?>

<!-- FORUM HEADER -->
<h2><?php echo _link($dm_page) ?></h2>

<!-- IF FORUM_DESC or MODERATORS or U_MCP -->
<?php if(isset($forum->description)): ?>
<div>
	<!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body -->
	<!-- IF FORUM_DESC --><div style="display: none !important;"><?php echo $forum->description ?><br /></div><!-- ENDIF -->
	<!-- IF MODERATORS --><p><strong><!-- IF S_SINGLE_MODERATOR --><?php echo __('Moderator'); ?><!-- ELSE --><?php echo __('Moderators'); ?><!-- ENDIF -->:</strong> {MODERATORS}</p><!-- ENDIF -->
</div>
<?php endif; ?>
<!-- ENDIF -->

<!-- TOPICS LIST -->
<?php
echo $topicPager->renderNavigationTop();

$row_class = 'bg1';
$topic_type = '';

?>
<div class="forumbg">
    <div class="inner"><span class="corners-top"><span></span></span>
        <ul class="topiclist">
            <li class="header">
                <dl class="icon">
                    <dt><?php echo __('Topics'); ?></dt>
                    <dd class="posts"><?php echo __('Posts'); ?></dd>
                    <dd class="views"><?php echo __('Views'); ?></dd>
                    <dd class="lastpost"><span><?php echo __('Last Post'); ?></span></dd>
		</dl>
            </li>
	</ul>
	<ul class="topiclist topics">
            <!-- STICKY TOPICS FIRST -->
            <?php
            foreach ($topicPager as $topic):
            if($topic->is_sticked):
            ?>
            <li class="row <?php echo $row_class ?>">
                <dl class="icon">
                    <dt title="<?php echo $topic ?>">
                        <?php echo _link($topic)->set('.topictitle') ?>
                        <?php if (! $topic->is_approved): ?>
                            <a href="{topicrow.U_MCP_QUEUE}"><img alt="<?php echo __('Unapproved') ?>" src="dmForumPlugin/images/icons/icon_topic_unapproved.gif" /></a>
                        <?php endif; ?>
			<?php echo __('by') ?> {topicrow.TOPIC_AUTHOR_FULL} &raquo; <?php echo format_datetime($topic->created_at) ?>
                    </dt>
                    <dd class="posts"><?php echo $topic->Posts->count() ?> <dfn><?php echo __('Replies') ?></dfn></dd>
                    <dd class="views"><?php echo $topic->views ?> <dfn><?php echo __('Views') ?></dfn></dd>
                    <dd class="lastpost">
                        <span>
                            <dfn><?php echo __('Last post') ?> </dfn>
                            <?php echo __('by') ?> {topicrow.LAST_POST_AUTHOR_FULL}
                            <a href="{topicrow.U_LAST_POST}">
                                <img alt="<?php echo __('Read latest post') ?>" src="dmForumPlugin/images/icons/icon_post_target.gif" />
                            </a>
                            <br /><?php echo format_datetime($topic->updated_at) ?></span>
                    </dd>
		</dl>
            </li>
            <?php endif; endforeach; ?>

            <!-- ALL OTHER TOPICS -->
            <?php
            foreach ($topicPager as $topic):
            if(! $topic->is_sticked):
            ?>
            <li class="row <?php echo $row_class ?>">
                <dl class="icon">
                    <dt title="<?php echo $topic ?>">
                        <?php echo _link($topic)->set('.topictitle') ?>
                        <?php if (! $topic->is_approved): ?>
                            <a href="{topicrow.U_MCP_QUEUE}"><img alt="<?php echo __('Unapproved') ?>" src="dmForumPlugin/images/icons/icon_topic_unapproved.gif" /></a>
                        <?php endif; ?>
			<?php echo __('by') ?> {topicrow.TOPIC_AUTHOR_FULL} &raquo; <?php echo format_datetime($topic->created_at) ?>
                    </dt>
                    <dd class="posts"><?php echo $topic->Posts->count() ?> <dfn><?php echo __('Replies') ?></dfn></dd>
                    <dd class="views"><?php echo $topic->views ?> <dfn><?php echo __('Views') ?></dfn></dd>
                    <dd class="lastpost">
                        <span>
                            <dfn><?php echo __('Last post') ?> </dfn>
                            <?php echo __('by') ?> {topicrow.LAST_POST_AUTHOR_FULL}
                            <a href="{topicrow.U_LAST_POST}">
                                <img alt="<?php echo __('Read latest post') ?>" src="dmForumPlugin/images/icons/icon_post_target.gif" />
                            </a>
                            <br /><?php echo format_datetime($topic->updated_at) ?></span>
                    </dd>
		</dl>
            </li>
            <?php endif; endforeach; ?>
        </ul>
	<span class="corners-bottom"><span></span></span>
    </div>
</div>

<?php echo $topicPager->renderNavigationBottom();