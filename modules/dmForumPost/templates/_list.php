<?php // Vars: $dmForumPostPager

echo $dmForumPostPager->renderNavigationTop();

echo _open('ul.elements');

foreach ($dmForumPostPager as $dmForumPost)
{
  echo _open('li.element');

    echo $dmForumPost;

  echo _close('li');
}

echo _close('ul');

echo $dmForumPostPager->renderNavigationBottom();