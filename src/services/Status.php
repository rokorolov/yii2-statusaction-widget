<?php

/**
 * @copyright Copyright (c) Roman Korolov, 2015
 * @link https://github.com/rokorolov
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 */

namespace rokorolov\statusaction\services;

use rokorolov\statusaction\StatusAction;
use rokorolov\helpers\Html;
use Yii;

/**
 * Status is a service for manage the statuses
 *
 * @author Roman Korolov <rokorolov@gmail.com>
 */
class Status extends StatusService
{
    const STATUS_UNPUBLISHED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 2;
    const STATUS_ARCHIVED = 3;
    const STATUS_TRASHED = -1;
        
    /**
     * Default items for render StatusAction widget.
     * 
     * @param array|string $statuses
     * @return array list of items for StatusAction widget.
     */
    public static function getStatusActions($statuses = null)
    {
        StatusAction::registerTranslation();
        
        $messageCategory = StatusAction::MESSAGE_CATEGORY;
        
        $actions =  [
            self::STATUS_PUBLISHED => [
                'label' => Yii::t($messageCategory, 'Publish'),
                'icon' => 'check fa-fw',
                'type' => Html::TYPE_SUCCESS,
                'changeTo' => Status::STATUS_UNPUBLISHED,
            ],
            self::STATUS_UNPUBLISHED => [
                'label' => Yii::t($messageCategory, 'Unpublish'),
                'icon' => 'times fa-fw',
                'type' => Html::TYPE_WARNING,
                'changeTo' => Status::STATUS_PUBLISHED,
            ],
            self::STATUS_DRAFT => [
                'label' => Yii::t($messageCategory, 'Draft'),
                'icon' => 'pencil fa-fw',
                'type' => Html::TYPE_INFO,
                'changeTo' => Status::STATUS_PUBLISHED,
            ],
            self::STATUS_ARCHIVED => [
                'label' => Yii::t($messageCategory, 'Archive'),
                'icon' => 'archive fa-fw',
                'type' => Html::TYPE_DEFAULT,
                'changeTo' => Status::STATUS_PUBLISHED,
            ],
            self::STATUS_TRASHED => [
                'label' => Yii::t($messageCategory, 'Trash'),
                'icon' => 'trash fa-fw',
                'type' => Html::TYPE_DANGER,
                'changeTo' => Status::STATUS_PUBLISHED,
            ],
        ];
        
        return self::getStatuses($statuses, $actions);
    }
}
