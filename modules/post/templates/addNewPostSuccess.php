<?php
if ($sf_user->getFlash('post_saved')) { ?>
    <script type="text/javascript">
        alert('<?php echo __("Post saved successfully") ?>');
        location.reload();
    </script>

<?php
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