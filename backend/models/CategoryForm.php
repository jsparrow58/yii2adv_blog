<?php
/**
 *
 * User: JSparrow
 * DateTime: 2016/11/14 13:57
 * Created by PhpStorm.
 */

namespace backend\models;


use backend\models\Base\BaseModel;
use common\models\Category;
use phpDocumentor\Reflection\Types\Null_;
use yii\base\Exception;

class CategoryForm extends BaseModel
{
    public $id;
    public $pid;
    public $status;
    public $title;
    public $description;
    public $position;

    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['pid', 'status'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'pid' => '上级栏目',
            'status' => '状态',
            'title' => '标题',
            'description' => '描述',
            'position' => '位置'
        ];
    }


    public function create()
    {
        if($this->validate()) {
            $model = new Category();
            try {
                $this->pid = empty($this->pid) ? null : $this->pid;
                $model->setAttributes($this->attributes);
                $model->created_at = time();
                $model->updated_at = time();
                $model->save();
                $this->id = $model->id;
                return true;
            } catch (Exception $exception) {
                throw new Exception($exception->getMessage());
            }
        }
        return false;
    }

    public function scenarios()
    {
        $scenarios[self::SCENARIO_CREATE] = ['pid', 'title', 'description', 'status'];
        $scenarios[self::SCENARIO_UPDATE] = ['pid', 'title', 'description', 'status'];
        return array_merge(parent::scenarios(), $scenarios);
    }

    public function getIsNewRecord() {
        return $this->getScenario() === self::SCENARIO_CREATE;
    }

}