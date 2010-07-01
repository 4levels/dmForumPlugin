<?php // Vars: $forumPager

echo $forumPager->renderNavigationTop();

echo _open('ul.elements');

foreach ($forumPager as $forum)
{
  echo _open('li.element');

    echo _link($forum);

  echo _close('li');
}

echo _close('ul');

echo $forumPager->renderNavigationBottom();