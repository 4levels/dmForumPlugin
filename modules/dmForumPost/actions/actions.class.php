<?php
/**
 * Post actions
 */
class dmForumPostActions extends myFrontModuleActions
{

  public function executeFormWidget(dmWebRequest $request)
  {
    $form = new forumPost();
        
    if ($request->hasParameter($form->getName()) && $form->bindAndValid($request))
    {
      $form->save();
      $this->redirectBack();
    }
    
    $this->forms['DmForumPost'] = $form;
  }


}
