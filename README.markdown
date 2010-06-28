dmForumPlugin
========================================================

Overview
--------

This is a port of dmForumPlugin for Doctrine & Symfony 1.4


Requirements
------------

The prerequisites for using the `dmForum` plugin are the same of dmForumplugin:

  * You have to install and configure sfDoctrineGuardPlugin - http://www.symfony-project.org/plugins/sfDoctrineGuardPlugin
  * If you want to use RSS feeds, you must install the sfFeed2Plugin - http://www.symfony-project.org/plugins/sfFeed2Plugin

Installation
------------

Install the plugin from the source you want (svn, git, etc ..)

Enabled it in `ProjectConfiguration.class.php`

    [php]
    class ProjectConfiguration extends sfProjectConfiguration
    {
      public function setup()
      {
        $this->enablePlugins(array(
          'sfDoctrinePlugin', 
          'sfDoctrineGuardPlugin',
          'dmForumPlugin',
          '...'
        ));
      }
    }

Rebuild the model, generate the SQL code for the new tables, insert it into your database and load the included fixtures :
    
    $ php symfony doctrine:build --all --and-load

Clear the cache to enable the autoloading to find the new classes:
    
    $ php symfony cc

Enable the new `dmForum` module and the new `dmForum` helper in your application, via the `settings.yml` file.
    
    [yml]
    // in myproject/apps/frontend/config/settings.yml
    all:
      .settings:
        enabled_modules:        [dmForum, default]
        standard_helpers:       [Partial, Cache, dmForum, I18N]

Publish assets for the forum

    $ php symfony plugin:publish-assets

As for now, fixtures aren't filed right all database's field, run this task that update last reply, nb posts, etc ..

    $ php symfony forum:fix

Start using the plugin by browsing to the frontend module's default page:
     
    http://myproject/frontend_dev.php/dmForum

If you want to enable the plugin administration interface, you have to enable two more modules. You can do so in your main application or in a backend application. the following example is for a 'backend' application:

    [yml]
    // in myproject/apps/backend/config/settings.yml
    all:
      .settings:
        enabled_modules:        [dmForumCategoryAdmin, dmForumForumAdmin, default]

Configure the plugin categories and forums by browsing to the administration modules default page:
     
    http://myproject/backend_dev.php/dmForumCategoryAdmin
    http://myproject/backend_dev.php/dmForumForumAdmin