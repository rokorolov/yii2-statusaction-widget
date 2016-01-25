<?php

/**
 * @copyright Copyright (c) Roman Korolov, 2015
 * @link https://github.com/rokorolov/yii2-fontawesome-asset
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 */

namespace rokorolov\statusaction;

/**
 * FontAwesomeAsset is a bundle for iconic font and CSS framework - Font Awesome.
 *
 * @author Roman Korolov <rokorolov@gmail.com>
 */
class StatusActionAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@rokorolov/statusaction/assets';
    public $js = [
        'js/statusaction.js'
    ];
}
