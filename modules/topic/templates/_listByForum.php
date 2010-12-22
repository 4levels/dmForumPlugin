<h2><?php echo _link($dm_page) ?></h2>

<!-- IF FORUM_DESC or MODERATORS or U_MCP -->
<div>
	<!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body -->
	<!-- IF FORUM_DESC --><div style="display: none !important;">{FORUM_DESC}<br /></div><!-- ENDIF -->
	<!-- IF MODERATORS --><p><strong><!-- IF S_SINGLE_MODERATOR -->{L_MODERATOR}<!-- ELSE -->{L_MODERATORS}<!-- ENDIF -->:</strong> {MODERATORS}</p><!-- ENDIF -->
</div>
<!-- ENDIF -->

<?php // Vars: $topicPager

echo $topicPager->renderNavigationTop();

?>

	<!-- IF topicrow.S_FIRST_ROW or not topicrow.S_TOPIC_TYPE_SWITCH -->
  <!-- IF topicrow.S_TOPIC_TYPE_SWITCH and (topicrow.S_POST_ANNOUNCE or topicrow.S_POST_GLOBAL) -- announcement<!-- ENDIF -->
		<div class="forumbg">
		<div class="inner"><span class="corners-top"><span></span></span>
		<ul class="topiclist">
			<li class="header">
				<dl class="icon">
					<dt><!-- IF S_DISPLAY_ACTIVE -->{L_ACTIVE_TOPICS}<!-- ELSEIF topicrow.S_TOPIC_TYPE_SWITCH and (topicrow.S_POST_ANNOUNCE or topicrow.S_POST_GLOBAL) -->{L_ANNOUNCEMENTS}<!-- ELSE -->{L_TOPICS}<!-- ENDIF --></dt>
					<dd class="posts">{L_REPLIES}</dd>
					<dd class="views">{L_VIEWS}</dd>
					<dd class="lastpost"><span>{L_LAST_POST}</span></dd>
				</dl>
			</li>
		</ul>
		<ul class="topiclist topics">
	<!-- ENDIF -->

<?php
$row_class = 'bg1';
$topic_type = '';
foreach ($topicPager as $topic)
{
  ?><!-- IF topicrow.S_POST_GLOBAL -- global-announce<!-- ENDIF --><!-- IF topicrow.S_POST_ANNOUNCE -- announce<!-- ENDIF --><!-- IF topicrow.S_POST_STICKY -- sticky<!-- ENDIF --><!-- IF topicrow.S_TOPIC_REPORTED -- reported<!-- ENDIF -->
		<li class="row <?php echo $row_class ?>">
			<dl class="icon" style="background-image: url({topicrow.TOPIC_FOLDER_IMG_SRC}); background-repeat: no-repeat;">
				<dt style="background-image: url({T_ICONS_PATH}{topicrow.TOPIC_ICON_IMG}); background-repeat: no-repeat;" title="<?php echo $topic ?>">
          <!-- IF topicrow.S_UNREAD_TOPIC --><a href="{topicrow.U_NEWEST_POST}">{NEWEST_POST_IMG}</a> <!-- ENDIF --><?php echo _link($topic)->set('.topictitle') ?>
					<!-- IF topicrow.S_TOPIC_UNAPPROVED or topicrow.S_POSTS_UNAPPROVED --><a href="{topicrow.U_MCP_QUEUE}">{topicrow.UNAPPROVED_IMG}</a> <!-- ENDIF -->
					<!-- IF topicrow.S_TOPIC_REPORTED --><a href="{topicrow.U_MCP_REPORT}">{REPORTED_IMG}</a><!-- ENDIF --><br />
					<!-- IF topicrow.PAGINATION --><strong class="pagination"><span>{topicrow.PAGINATION}</span></strong><!-- ENDIF -->
					<!-- IF topicrow.ATTACH_ICON_IMG -->{topicrow.ATTACH_ICON_IMG} <!-- ENDIF -->{L_POST_BY_AUTHOR} {topicrow.TOPIC_AUTHOR_FULL} &raquo; {topicrow.FIRST_POST_TIME}
				</dt>
				<dd class="posts"><?php $topic->Posts->count() ?> <dfn>{L_REPLIES}</dfn></dd>
				<dd class="views">{topicrow.VIEWS} <dfn>{L_VIEWS}</dfn></dd>
				<dd class="lastpost"><span><dfn>{L_LAST_POST} </dfn>{L_POST_BY_AUTHOR} {topicrow.LAST_POST_AUTHOR_FULL}
					<!-- IF not S_IS_BOT --><a href="{topicrow.U_LAST_POST}">{LAST_POST_IMG}</a> <!-- ENDIF --><br />{topicrow.LAST_POST_TIME}</span>
				</dd>
			</dl>
		</li>
<?php } ?>
	<!-- IF topicrow.S_LAST_ROW -->
			</ul>
		<span class="corners-bottom"><span></span></span></div>
	</div>



<?php echo _open('ul.elements');

foreach ($topicPager as $topic)
{
  echo _open('li.element');

    echo _link($topic);

  echo _close('li');
}

echo _close('ul');

echo $topicPager->renderNavigationBottom();