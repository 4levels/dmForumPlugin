<?php // Vars: $dmForumForumPager

echo $dmForumForumPager->renderNavigationTop();

echo _open('ul.elements');

foreach ($dmForumForumPager as $dmForumForum)
{
  echo _open('li.element');

    echo _link($dmForumForum);

  echo _close('li');
}

echo _close('ul');

echo $dmForumForumPager->renderNavigationBottom();