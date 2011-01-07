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

  public function executeShowWidget(dmWebRequest $request) {
      /* @var $record dmDoctrineRecord */
      $record = $this->context->getPage()->getRecord();
      $record->set('views', $record->views + 1)->save();
      
  }
}
