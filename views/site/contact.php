<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Nosotros responderemos a la mayor brevedad posible.
        </div>

        <p>
            Tenga en cuenta que si enciende el depurador de Yii, debería poder
            para ver el mensaje de correo en el panel de correo del depurador.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Debido a que la aplicación está en modo de desarrollo, el correo electrónico no se envía sino que se guarda como un archivo debajo 
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Configure la propiedad <code> useFileTransport </code> del <code> mail </code>
                El componente de la aplicación debe ser falso para permitir el envío de correo electrónico.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Si tiene consultas comerciales u otras preguntas, complete el siguiente formulario para comunicarse con nosotros. Gracias.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
