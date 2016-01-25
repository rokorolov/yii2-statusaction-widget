<?php

/**
 * @copyright Copyright (c) Roman Korolov, 2015
 * @link https://github.com/rokorolov
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 */

namespace rokorolov\statusaction\actions;

use rokorolov\statusaction\StatusAction as StatusWidget;
use Yii;

/**
 * StatusAction is a action for manage the statuses
 *
 * @author Roman Korolov <rokorolov@gmail.com>
 */
class StatusAction extends \yii\base\Action
{
    /**
     *
     * @var \yii\db\ActiveRecord $model the data model 
     */
    public $model;
    
    /**
     * Run the action
     * 
     * @param integer $id
     * @param integer|string $status
     */
    public function run($id, $status)
    {
        StatusWidget::registerTranslation();
        
        $model = $this->model;
        if (in_array($status, $model::getStatuses())) {
            $model = $model::findOne($id);
            $model->status = $status;
            if($model->save(false)) {
                Yii::$app->session->setFlash('success', Yii::t(StatusWidget::MESSAGE_CATEGORY, 'Changed status successfully!'));
            }
        }

        !Yii::$app->request->isAjax && $this->controller->redirect(Yii::$app->request->referrer);
    }
}
