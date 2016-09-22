vanilla-server
==============

App to build vanilla web apps using Silex

##Install
 - run `./composer install`
 - update config/development.json

##Server Setup
 - Download (in a seperate directory) https://github.com/richardhealy/super-simple-api.git
 - Add VHost pointing to api.dev (pointing to root directory)
 - Add `SetEnv APPLICATION_ENV development` to your VHost
