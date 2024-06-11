<?php 
require '../components/cabecalho.php'; 
?>

<div class="container">
    <div class="my-2">
        <div class="row justify-content-between">
            <div class="col-3">
                <h3>
                    NOVO MEDICAMENTO
                </h3>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3"></div>
            <div class="col-6 bg-light p-3">
                <form enctype="multipart/form-data" action="alunos-gravar.php" method="POST">
                    <div class="mb-3">
                        <label for="txtnome" class="form-label">Nome do medicamento</label>
                        <input type="text" name="txtnome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtemail" class="form-label">Descrição:</label>
                        <input type="text" name="txtemail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtfoto" class="form-label">Quantidade de doses:</label>
                        <input type="number" name="Quantidade" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="selturma" class="form-label">Tipo de medicamento:</label>
                        <select name="selturma" class="form-control">
                            <option value=''>Selecione...</option>
                            <option value='1'>Genérico</option>
                            <option value='2'>Referência</option>
                            <option value='3'>Similar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtfoto" class="form-label">Começo do tratamento:</label>
                    </div>
                    <div class="mb-3">
                        <label for="txtfoto" class="form-label">Final do tratamento:</label>
                        <input type="date" name="Quantidade" class="form-control">
                    </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">ADICIONAR</button>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php 
require '../components/rodape.php'; 
?>