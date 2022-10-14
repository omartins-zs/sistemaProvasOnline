<div class="alert alert-dark">
  Pregunta <?= $questao->questao_id ?> de <?= $count_questoes ?>
</div>
<p class="font-weight-bolder"><?= $questao->questao ?></p>

<form method="post" action="<?= base_url('quiz/process'); ?>">
  <?php foreach ($escolhas as $key => $escolha) : ?>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="escolha" id="escolha<?= $key + 1 ?>" value="<?= $escolha->id ?>">
      <label class="form-check-label" for="escolha<?= $key + 1 ?>">
        <?= $escolha->escolha ?>
      </label>
    </div>
    <input type="hidden" name="questao_id" value="<?= $questao->questao_id ?>">
  <?php endforeach ?>
  <input type="submit" value="Enviar" class="btn btn-primary mt-3">
</form>