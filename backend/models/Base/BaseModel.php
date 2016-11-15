<?php
/**
 *
 * User: JSparrow
 * DateTime: 2016/11/11 14:02
 * Created by PhpStorm.
 */

namespace backend\models\Base;


use yii\base\Model;

class BaseModel extends Model
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function getIsNewRecord() {
        return $this->getScenario() === self::SCENARIO_CREATE;
    }
}