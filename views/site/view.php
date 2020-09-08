<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<script type="text/javascript">
    function Confirmdelete(){
      var respuesta = confirm('¿Estas seguro de que quieres eliminar este estudiante?');
      if (respuesta == true){
          return true;
      }else{
        return false;
      }
    }
</script>

<a href="<?= Url::toRoute("site/create") ?>" class="btn btn-primary">Crear nuevo alumno</a><br><br>

<?php $f = ActiveForm::begin([
    "method" => "get",
    "action" => Url::toRoute("site/view"),
    "enableClientValidation" => true,
]); 
?>
<div class="form-group">
    <?= $f->field($form, "q")->input("search") ?>
</div>
<?= Html::submitButton("Buscar", ["class" => "btn btn-info"]) ?>

<?php $f->end() ?>

<h3><?= $search ?></h3>

<h3>Lista de alumnos</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col"><b>Id</b></th>
      <th scope="col"><b>Nombre</b></th>
      <th scope="col"><b>Apellidos</b></th>
      <th scope="col"><b>Clase</b></th>
      <th scope="col"><b>Nota Final</b></th>
      <th scope="col"><b>Editar</b></th>
      <th scope="col"><b>Borrar</b></th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($model as $row): ?>
	    <tr>
	      <th scope="row"><?=$row->id_alumno?></th>
	      <td><?= $row->nombre ?></td>
	      <td><?= $row->apellidos ?></td>
	      <td><?= $row->clase ?></td>
	      <td><?= $row->nota_final ?></td>
	      <td><a href="<?= Url::toRoute(["site/update", "id_alumno" => $row->id_alumno]) ?>" class="btn btn-success"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg> Editar</a></td>
        <?= Html::beginForm(Url::toRoute("site/delete"), "POST") ?>
        <input type="hidden" name="id_alumno" value="<?= $row->id_alumno ?>">
	      <td><button type="submit" class="btn btn-danger" onclick='return Confirmdelete()'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> Borrar</button></td>
        <?= Html::endForm() ?>
	    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= LinkPager::widget([
    "pagination" => $pages,
]);

