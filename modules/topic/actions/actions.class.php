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

  public function executeListByForum(dmWebRequest $request) {
      var_dump($request);
  }
}
