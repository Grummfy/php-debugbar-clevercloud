# Debug bar information about clever cloud instance

Adding information from instance running on [clever cloud](https://www.clever-cloud.com) for the [php debugbar](http://phpdebugbar.com/).

## Install & configuration

```
composer require --dev grummfy/php-debugbar-clevercloud
```

Then add to your debugbar :

```
$debugbar->addCollector(new Grummfy\DebugBar\CleverCloudCollector());
```

You can also say to hide some value by giving them to the debug bar:

```
$debugbar->addCollector(new Grummfy\DebugBar\CleverCloudCollector(['APP_ID']));
```

### Integration to other debug bar

On any bar based on php-debugbar, it will be the same.

An example with [laravel](https://github.com/barryvdh/laravel-debugbar):

```
Debugbar::addCollector(new Grummfy\DebugBar\CleverCloudCollector());
```

### List of data exposed

* APP_ID: the ID of the application.
* INSTANCE_ID: the ID of the current instance (scaler) of your application.
* INSTANCE_TYPE: The type of the instance (scaler).
* COMMIT_ID: the commit ID used as a base to deploy your application.
* APP_HOME: the absolute path of your application on the server.
* INSTANCE_NUMBER: the number of this instances inside all the sacaler (if you got 3 scaler it can be a number between 0 to 2)

More information of [environment variables](https://www.clever-cloud.com/doc/admin-console/environment-variables/#special-environment-variables).
