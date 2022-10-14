<h2>Quiz de conhecimento sobre PHP</h2>
<p>É um teste de múltipla escolha</p>
<ul>
    <li> <strong> Número de preguntas:</strong> <?= $count_questoes ?> </li>
    <li> <strong> Tipo: </strong> Escolhas múltiplas </li>
    <li> <strong> Tempo Estimado : </strong><?= $count_questoes * .5 ?> Minuto(s) por pergunta</li>
</ul>

<div class="d-flex justify-content-between mr-3">
    <a href="<?= base_url('quiz/questao/1') ?>" class="btn btn-sm btn-primary"> Começar</a>

    <a href="<?= base_url('quiz/add') ?>" class="btn btn-sm btn-success"><i class="fa fa-question-circle mr-1"></i>Cadastrar pergunta</a>
</div>