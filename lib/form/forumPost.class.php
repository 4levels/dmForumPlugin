<?php

/**
 * PlugindmForumPost form.
 *
 * @package    form
 * @subpackage dmForumPost
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class forumPost extends PlugindmForumPostForm
{
  public function configure()
  {
    parent::configure();
    $user = sfContext::getInstance()->getUser();
    $widgetSchema = $this->getWidgetSchema();
    $validatorSchema = $this->getValidatorSchema();
    
    unset(
      $widgetSchema['created_at'],
      $widgetSchema['updated_at'],
      $widgetSchema['created_by'],
      $widgetSchema['updated_by'],
      $widgetSchema['author_name']
    );

    unset(
      $validatorSchema['created_at'],
      $validatorSchema['updated_at'],
      $validatorSchema['created_by'],
      $validatorSchema['updated_by'],
      $validatorSchema['author_name']
    );
    
    $widgetSchema['topic_id'] = new sfWidgetFormInputHidden();
    
    $validatorSchema['content'] = new sfValidatorString(array('required' => true));
    
    $widgetSchema->setNameFormat('forum_post[%s]');
  }
}