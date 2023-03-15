<?php
/* @var $this SemanaController */
/* @var $model Semana */
/* @var $form CActiveForm */
?>

<style>
	.errorSummary,
	.errorMessage {
		color: red;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$('#actividad').change(function() {
			if ($(this).val() == '0') {
				$('#Semana_otra_actividad').prop('disabled', false);
			} else {
				$('#Semana_otra_actividad').prop('disabled', true);
			}
		});
	});
</script>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'semana-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

	<p class="note">
		Campos con <span class="required">*</span> son requeridos.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
		<tr>
			<td>
				<div>
					<?php echo $form->labelEx($model, 'institucion'); ?>
					<?php echo $form->textField($model, 'institucion', array('size' => 60, 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'institucion'); ?>
				</div>
			</td>
			<td><?php $this->renderPartial('_logo', array(
					'model' => $model, 'form' => $form
				)); ?></td>
		</tr>
	</table>

	<br />
	<div>
		<?php echo $form->labelEx($model, 'sector'); ?>
		<?php echo $form->dropDownList(
			$model,
			'sector',
			Semana::sector(),
			array('empty' => '--- ¿A qué sector perteneces? ---', 'id' => 'sector')
		); ?>
		<?php echo $form->error($model, 'sector'); ?>
	</div>
	<br />

	<br />
	<div>
		<?php echo $form->labelEx($model, 'publico_meta'); ?>
		<?php echo $form->dropDownList(
			$model,
			'publico_meta',
			Semana::publico_meta(),
			array('empty' => '--- ¿A quién va dirigido? ---', 'id' => 'publico_meta')
		); ?>
		<?php echo $form->error($model, 'publico_meta'); ?>
	</div>
	<br />

	<div>
		<?php echo $form->labelEx($model, 'estado_id'); ?>
		<?php echo $form->dropDownList(
			$model,
			'estado_id',
			CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),
			array('empty' => '---Selecciona un estado---', 'id' => 'estado')
		); ?>
		<?php echo $form->error($model, 'estado_id'); ?>
	</div>
	<br>

	<br />
	<div>
		<?php echo $form->labelEx($model, 'formato_actividad'); ?>
		<?php echo $form->dropDownList(
			$model,
			'formato_actividad',
			Semana::formato_actividad(),
			array('empty' => '--- ¿Cómo se llevará a cabo el evento? ---', 'id' => 'formato_actividad')
		); ?>
		<?php echo $form->error($model, 'formato_actividad'); ?>
	</div>
	<br />

	<div>
		<?php echo $form->labelEx($model, 'direccion'); ?><br>
		<?php echo $form->textArea($model, 'direccion', array('rows' => 4, 'cols' => 50, "placeholder" => "Puede ser una dirección, punto de interés, URL de facebook, etc.")); ?>
		<?php echo $form->error($model, 'direccion'); ?>
	</div>
	<br>
	<div>
		<?php echo $form->labelEx($model, 'actividad'); ?>
		<?php echo $form->dropDownList(
			$model,
			'actividad',
			Semana::actividades(),
			array('empty' => '---Selecciona una actividad---', 'id' => 'actividad')
		); ?>
		<?php echo $form->error($model, 'actividad'); ?>
	</div>
	<div>
		<?php echo $form->labelEx($model, 'otra_actividad'); ?>
		<span><em>Solo si tu actividad no se encuentra en la lista</em> </span><br>
		<?php echo $form->textField($model, 'otra_actividad', array('size' => 60, 'maxlength' => 255, 'disabled' => $model->actividad == '0' ? false : true)); ?>
		<?php echo $form->error($model, 'otra_actividad'); ?>
	</div>
	<br>
	<div>
		<?php echo $form->labelEx($model, 'descripcion'); ?><br>
		<?php echo $form->textArea($model, 'descripcion', array('rows' => 4, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'descripcion'); ?>
	</div>
	<br>
	<table cellpadding="20">
		<tr>
			<td>
				<div>
					<?php echo $form->labelEx($model, 'fecha_ini'); ?>
					<?php
					$this->widget(
						'ext.jui.EJuiDateTimePicker',
						array(
							'model'     => $model,
							'attribute' => 'fecha_ini',
							//'flat'=>true,
							//'value' => '2014-03-14 14:00:00',
							//'language'=> 'ru',//default Yii::app()->language
							//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
							'options'   => array(
								'dateFormat' => 'yy-mm-dd',
								//'timeFormat' => 'hh:mm',
								'hourMin' => 6,
								'hourMax' => 22,
								'minDate' => $this->formatoFecha('aaaa-mm-dd', Yii::app()->params->fecha_inicio),
								'maxDate' => $this->formatoFecha('aaaa-mm-dd', Yii::app()->params->fecha_termino),
							),
							'htmlOptions' => array(
								//'disabled'=>true
							),
						)
					);
					?>
					<?php echo $form->error($model, 'fecha_ini'); ?>
				</div>
			</td>
			<td>
				<div>
					<?php echo $form->labelEx($model, 'fecha_fin'); ?>
					<?php
					$this->widget(
						'ext.jui.EJuiDateTimePicker',
						array(
							'model'     => $model,
							'attribute' => 'fecha_fin',
							//'flat'=>true,
							//'value' => '2014-03-14 14:00:00',
							//'language'=> 'ru',//default Yii::app()->language
							//'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
							'options'   => array(
								'dateFormat' => 'yy-mm-dd',
								//'timeFormat' => 'hh:mm',
								'hourMin' => 6,
								'hourMax' => 22,
								'minDate' => $this->formatoFecha('aaaa-mm-dd', Yii::app()->params->fecha_inicio),
								'maxDate' => $this->formatoFecha('aaaa-mm-dd', Yii::app()->params->fecha_termino),
							),
							'htmlOptions' => array(
								//'style'=>'height:20px',
							),
						)
					);
					?>
					<?php echo $form->error($model, 'fecha_fin'); ?>
				</div>
			</td>
		</tr>
	</table>

	<div>
		<?php echo $form->labelEx($model, 'informes');
		?>
		<span><em>en caso de dudas o sugerencias</em> </span><br>
		<?php echo $form->textArea($model, 'informes', array('rows' => 4, 'cols' => 50, "placeholder" => "Puede ser un nombre, teléfono, whatsapp, correo electrónico, etc")); ?>
		<?php echo $form->error($model, 'informes'); ?>
	</div>
	<br>
	<div>
		<?php echo $form->labelEx($model, 'url'); ?>
		<span><em>para más detalles</em> </span><br>
		<?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 255, "placeholder" => "ej. https://www.biodiversidad.gob.mx")); ?>
		<?php echo $form->error($model, 'url'); ?>
	</div>
	<br>
	<?php $this->renderPartial('_materiales', array(
		'model' => $model, 'form' => $form, 'model_materiales' => isset($model_materiales) ? $model_materiales : array(),
	)); ?>

	<?php echo $form->hiddenField($model, 'usuarios_id', array('value' => $usuario)); ?>

	<div align="right">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear evento' : 'Actualizar evento'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->