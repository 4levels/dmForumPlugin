dmForumPlugin
========================================================

Warning
-------

This plugin is far from finished!
It still needs a lot of refactoring as most of the ported features have to be completely rewritten
as Diem provides so many helpers and functionality so that most of the original `sfForumPlugin` and `sfDoctrineForumPlugin` features are superfluous.

Overview
--------

This is a port of sfDoctrineForumPlugin for Diem


Requirements
------------

The prerequisites for using the `dmForumForum` plugin are the same as for any Diem plugin

Also you need to install the following Diem plugins:
- dmTagPlugin

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
          '...'
          'dmForumPlugin',
          '...'
        ));
      }
    }

Rebuild the model, generate the SQL code for the new tables, insert it into your database and load the included fixtures :
    
    $ php symfony dm:setup --clear-db
    $ php symfony doctrine:data-load

Clear the cache to enable the autoloading to find the new classes:
    
    $ php symfony ccc

Enable the new `dmForum` module and the new `dmForum` helper in your application, via the `settings.yml` file.
    
Publish assets for the forum

    $ php symfony plugin:publish-assets
