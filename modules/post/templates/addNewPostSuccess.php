<?php
if ($sf_user->getFlash('post_saved')) {
    echo _open('p');
    echo __('Post saved successfully');
    echo _close('p');
} else {
    echo $form->open(array('id' => 'add_post_form', 'onsubmit' => 'return saveForumPost()'));

    echo _tag('ul',
            _tag('li', $form['content']->label()->field()->error())
        );

    echo $form->renderHiddenFields();
    echo $form->submit('save');
    echo $form->close();
}
?>