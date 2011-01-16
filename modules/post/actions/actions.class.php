<?php
/**
 * Post actions
 */
class postActions extends myFrontModuleActions
{

  public function executeFormWidget(dmWebRequest $request)
  {
    $form = new DmForumPostForm();
        
    if ($request->hasParameter($form->getName()) && $form->bindAndValid($request))
    {
      $form->save();
      $this->redirectBack();
    }
    
    $this->forms['DmForumPost'] = $form;
  }

  public function executeAddNewPost(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $form = new DmForumPostForm();

      $form->setDefault('user_id', $this->getUser()->getUserId());
      $form->changeToHidden('user_id');

      $form->setDefault('is_active', 1);
      $form->changeToHidden('is_active');

      if ($request->hasParameter('topic_id')) {
        $form->setDefault('topic_id', $request->getPostParameter('topic_id'));
        $form->changeToHidden('topic_id');
      }

      unset($form->getObject()->Topic);

      if ($request->hasParameter($form->getName()) && $form->bindAndValid($request)) {
        $form->save();

        $this->getUser()->setFlash('post_saved', true);
      }

      $this->form = $form;
  }

  public function executeAddReply(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $form = new DmForumPostForm();

      $form->setDefault('user_id', $this->getUser()->getUserId());
      $form->changeToHidden('user_id');

      $form->setDefault('is_active', 1);
      $form->changeToHidden('is_active');

      if ($request->hasParameter('topic_id')) {
        $form->setDefault('topic_id', $request->getPostParameter('topic_id'));
        $form->changeToHidden('topic_id');
      }

      unset($form->getObject()->Topic);

      if ($request->hasParameter($form->getName()) && $form->bindAndValid($request)) {
        $form->save();

        $this->getUser()->setFlash('post_saved', true);
      }

      $this->form = $form;
  }


}
