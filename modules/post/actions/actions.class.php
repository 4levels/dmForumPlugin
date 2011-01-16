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

  public function executeListByTopicWidget(dmWebRequest $request) {
      /* @var $record dmDoctrineRecord */
      $record = $this->context->getPage()->getRecord();
      
      $record->set('views', $record->views + 1)->save();
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

  public function executeDelete(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $this->postId = $request->getPostParameter('post_id');
      $this->postDeleted = false;
      
      if ($request->getPostParameter('confirmed')) {
          DmForumPostTable::getInstance()->findBy('id', $this->postId)
                                         ->delete();

          $this->postDeleted = true;
      }
  }

  public function executeEdit(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $form = new DmForumPostForm(Doctrine::getTable('DmForumPost')->find($request->getParameter('id')));

      $form->setDefault('user_id', $form->getObject()->user_id);
      $form->changeToHidden('user_id');

      $form->setDefault('is_active', $form->getObject()->is_active);
      $form->changeToHidden('is_active');

      $form->setDefault('topic_id', $form->getObject()->topic_id);
      $form->changeToHidden('topic_id');

      $form->setDefault('is_approved', $form->getObject()->is_approved);
      $form->changeToHidden('is_approved');


      if ($request->hasParameter($form->getName()) && $form->bindAndValid($request)) {
        $form->save();

        $this->getUser()->setFlash('post_saved', true);
      }

      $this->form = $form;
      $this->postId = $request->getParameter('id');
  }

  public function executeApprove(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $this->postId = $request->getParameter('post_id');
      $this->postApproved = false;

      if ($request->hasParameter('approve')) {
          $post = DmForumPostTable::getInstance()->find($this->postId);
          $post->set('is_approved', true)->save();

          $this->postApproved = true;
      }
  }


}
