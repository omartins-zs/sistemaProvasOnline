<div class="alert alert-primary">
    Adicionar uma pergunta
</div>
<?php if ($this->session->flashdata('msg')) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <?= $this->session->flashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>
<?php if (validation_errors()) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo validation_errors('<li>', '</li>'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
<form method="post" action="<?= base_url('quiz/add'); ?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="questao_id">Número de Pregunta</label>
            <input type="number" min="1" class="form-control" id="questao_id" name="questao_id" value="<?php echo set_value('questao_id', $count_questoes + 1) ?>">
        </div>
        <div class="form-group col-md-8">
            <label for="questao">Pregunta</label>
            <input type="text" class="form-control" id="questao" name="questao" value="<?= set_value('questao') ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="escolha1">Alternativa 1</label>
            <input type="text" class="form-control" id="escolha1" name="escolhas[]" value="<?= set_value('escolhas[]') ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="escolha2">Alternativa 2</label>
            <input type="text" class="form-control" id="escolha2" name="escolhas[]" value="<?= set_value('escolhas[]') ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="escolha3">Alternativa 3</label>
            <input type="text" class="form-control" id="escolha3" name="escolhas[]" value="<?= set_value('escolhas[]') ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="escolha4">Alternativa 4</label>
            <input type="text" class="form-control" id="escolha4" name="escolhas[]" value="<?= set_value('escolhas[]') ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="escolha5">Alternativa 5</label>
            <input type="text" class="form-control" id="escolha5" name="escolhas[]" value="<?= set_value('escolhas[]') ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="correto">Número de respuesta correcta</label>
            <input type="number" min="1" class="form-control" id="correto" name="correto" value="<?= set_value('correto') ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar Pregunta</button>
</form>