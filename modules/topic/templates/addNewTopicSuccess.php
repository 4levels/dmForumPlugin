<?php
/* @var $form dmForm */

if ($sf_user->getFlash('topic_id')) { ?>
    <script type="text/javascript">
        addTopicPost(<?php echo $sf_user->getFlash('topic_id') ?>);
    </script>
<?php } else {

    echo $form->open(array('id' => 'add_topic_form', 'onsubmit' => 'return saveForumTopic()'));

    echo _tag('ul',
            _tag('li', $form['title']->label()->field()->error())
        );

    echo $form->renderHiddenFields();

    echo $form->submit('continue');

    echo $form->close();
}
?>