yii2-statusaction-widget
======================
StatusAction is a widget for working with the statuses.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist rokorolov/yii2-statusaction-widget "*"
```

or add

```
"rokorolov/yii2-statusaction-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
use rokorolov\statusaction\StatusAction;

<?= StatusAction::widget([
    'key' => $key, // the key associated with the data model
    'status' => $status, // current status
    'buttons' => [] // array, list of items
]); ?>
```