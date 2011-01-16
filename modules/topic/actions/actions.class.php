<?php
/**
 * Topic actions
 */
class topicActions extends myFrontModuleActions
{

  public function executeFormWidget(dmWebRequest $request)
  {
    $form = new DmForumTopicForm();
        
    if ($request->hasParameter($form->getName()) && $form->bindAndValid($request))
    {
      $form->save();
      $this->redirectBack();
    }
    
    $this->forms['DmForumTopic'] = $form;
  }

  public function executeAddNewTopic(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $form = new DmForumTopicForm();

      if ($request->hasParameter('forum_id')) {
        $form->setDefault('forum_id', $request->getPostParameter('forum_id'));
        $form->changeToHidden('forum_id');
      }

      $form->setDefault('user_id', $this->getUser()->getUserId());
      $form->changeToHidden('user_id');

      $form->setDefault('is_active', 1);
      $form->changeToHidden('is_active');

      if ($request->hasParameter($form->getName()) && $form->bindAndValid($request)) {
          $form->save();

          $this->getUser()->setFlash('topic_id', $form->getObject()->getId());
      }

      $this->form = $form;
      
  }

  public function executeApprove(dmWebRequest $request) {
      $this->forward404Unless($request->isXmlHttpRequest());

      $this->topicId = $request->getParameter('topic_id');
      $this->topicApproved = false;
      $this->topicDeleted = false;

      if ($request->hasParameter('approve')) {
          $topic = DmForumTopicTable::getInstance()->find($this->topicId);
          $topic->set('is_approved', true)->save();
          $this->topicApproved = true;
      } elseif ($request->hasParameter('forbid')) {
          $topic = DmForumTopicTable::getInstance()->find($this->topicId);
          $topic->delete();
          $this->topicDeleted = true;
      }
  }
}
