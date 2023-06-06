<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\blockmodules;

use humhub\components\Controller;
use humhub\modules\calendar\widgets\CalendarControls;
use humhub\modules\calendar\widgets\ConfigureButton;
use humhub\modules\user\widgets\AccountMenu;
use Yii;
use yii\base\ActionEvent;
use yii\base\WidgetEvent;
use yii\helpers\Url;

class Events
{
    public static function onControllerAction(ActionEvent $event)
    {
        /** @var Controller $controller */
        $controller = $event->sender;

        /** @var Module $module */
        $module = Yii::$app->getModule('blockmodules');

        if (in_array($controller->id . '.' . $event->action->id, $module->forbiddenActions)) {
            $event->isValid = false;
            $event->result = Yii::$app->response->redirect(['/activity/user']);
        }
    }

    public static function onAccountMenu($event)
    {
        /** @var AccountMenu $accountMenu */
        $accountMenu = $event->sender;

        $accountMenu->deleteItemByUrl(Url::to(['/user/account/edit-modules']));

    }

    /**
     * Remove "Add profile calendar" gear button on the top right of the page /calendar/global/index
     * @param WidgetEvent $event
     * @return void
     */
    public static function onCalendarControlsBeforeRun(WidgetEvent $event)
    {
        /** @var CalendarControls $calendarControls */
        $calendarControls = $event->sender;
        foreach ($calendarControls->widgets as $key => $widget) {
            if (in_array(ConfigureButton::class, $widget, true)) {
                unset($calendarControls->widgets[$key]);
            }
        }
    }
}
