<?php
if ($sf_user->getFlash('post_saved')) { ?>
    <script type="text/javascript">
        alert('<?php echo __("Post saved successfully") ?>');
        location.reload();
    </script>

<?php
} else {
    echo $form->open(array('id' => 'add_reply_form', 'onsubmit' => 'return saveForumTopicReply()'));

    echo _tag('ul',
            _tag('li', $form['title']->label()->field()->error()) . 
            _tag('li', $form['content']->label()->field()->error())
        );

    echo $form->renderHiddenFields();
    echo $form->submit('save');
    echo $form->close();
}
?>