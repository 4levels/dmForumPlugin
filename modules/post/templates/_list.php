<?php // Vars: $postPager

echo $postPager->renderNavigationTop();

echo _open('ul.elements');

foreach ($postPager as $post)
{
  echo _open('li.element');

    echo $post;

  echo _close('li');
}

echo _close('ul');

echo $postPager->renderNavigationBottom();