<?php
if ($sf_user->getFlash('post_saved')) { ?>
    <script type="text/javascript">
        alert('<?php echo __("Post updated successfully") ?>');
        location.reload();
    </script>

<?php
} else {
    echo $form->open(array('id' => 'edit_post_form', 
                           'onsubmit' => 'return updateForumPost(' . $postId . ')'
                    ));

    echo _tag('ul',
            _tag('li', $form['title']->label()->field()->error()) .
            _tag('li', $form['content']->label()->field()->error())
        );

    echo $form->renderHiddenFields();
    echo $form->submit('save');
    echo $form->close();
}
?>