<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use tubasaygin\products\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $model vendor\modules\products\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'created_at')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'price')->textInput() ?>

<?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name'),['prompt'=>'Select Category']); ?>

<?= $form->field($model, 'logo')->fileInput(); ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

