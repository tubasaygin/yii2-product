<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use tubasaygin\products\models\Product;
use tubasaygin\products\models\ProductCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel vendor\modules\products\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
?>

<div class="product-index">

<div class="body-content">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <div class="well well-sm">
            <div class="col-xs-10 form-inline">
                <?php

                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'method' => 'get',
                    'action' => Url::to(['product/index'])

                ]);  
                $item_model = new product();
                if(isset(\Yii::$app->request->get()['item']['category_id']))
                {
                    $item_model->category_id = \Yii::$app->request->get()['item']['category_id'];
                }

                ?>
                <?= $form->field(new product(), 'category_id')->dropDownList(ArrayHelper::map(
                    ProductCategory::find()->all(), 'id', 'name'),['prompt' => 'Select Category..'])->label('Category') ?>

            </div>
            <div>
                <?= Html::submitButton('Filter', ['class' => 'btn btn-success', 'style' => 'width:100px', 'name' => 'filter-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    </div>

    <div class="row">

        <?php
        $items = $provider->getModels();
        foreach($items as $item): ?>
        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?=$item->logo?>" alt="" style="min-height:300px; max-height:300px"/>
                <div class="caption">
                    <h3 class="group inner list-group-item-heading">
                        Product name:
                        <?= $item->name?></h3>
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                Price:
                                <?=$item->price?> TL
                            </p>
                       
                        </div>
                </div>
               
                <div class="row">
                    <div class="btn-group btn-group-justified">
                       <?php
                            echo Html::a('Update', ['update', 'id' => $item->id], ['class' => 'btn btn-success']);
                            echo Html::a('View', ['view', 'id' => $item->id], ['class' => 'btn btn-primary']);

                            echo Html::a('Delete', ['delete', 'id' => $item->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php endforeach;?>
  
</div>
</div>
</div>
</div>
