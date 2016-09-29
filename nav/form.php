<?php
if (! isset($cotacao)) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cotação de Preços | Aiha Lâmpadas</title>
        <link href="nav/estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form class="content" id="cotacao" action="" method="post">
            <div class="msg"><?= $cotacao[ 'msg' ] ?></div>

            <!-- CAMPOS -->
            <input type="text" name="razao" id="razao" value="<?= $cotacao[ 'razao' ] ?>" required>
            <input type="email" name="email" id="email" value="<?= $cotacao[ 'email' ] ?>" required>
            <input type="text" name="cnpj" id="cnpj" value="<?= $cotacao[ 'cnpj' ] ?>" required>
            <input type="text" name="ie" id="ie" value="<?= $cotacao[ 'ie' ] ?>">
            <select name="tipo" id="tipo">
                <option <?= ($cotacao[ 'tipo' ] == 'Consumo' ? 'selected' : '') ?>>Consumo</option>
                <option <?= ($cotacao[ 'tipo' ] == 'Revenda' ? 'selected' : '') ?>>Revenda</option>
            </select>
            <input type="text" name="cep" id="cep" value="<?= $cotacao[ 'cep' ] ?>">
            <input type="text" name="rua" id="rua" value="<?= $cotacao[ 'rua' ] ?>">
            <input type="text" name="num" id="num" value="<?= $cotacao[ 'num' ] ?>">
            <input type="text" name="bairro" id="bairro" value="<?= $cotacao[ 'bairro' ] ?>">
            <input type="text" name="cidade" id="cidade" value="<?= $cotacao[ 'cidade' ] ?>">
            <input type="text" name="uf" id="uf" value="<?= $cotacao[ 'uf' ] ?>">
            <input type="text" name="telefone" id="telefone" value="<?= $cotacao[ 'telefone' ] ?>" required>
            <textarea name="obs" id="obs"><?= $cotacao[ 'obs' ] ?></textarea>

            <!-- Produtos -->
            <table id="produtos">
                <thead>
                    <tr>
                        <td>Produto</td>
                        <td>Qtde</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pegando itens selecionados, se houverem -->
                    <?php foreach ($cotacao[ 'itens' ] as $item) { ?>
                        <tr>
                            <td>
                                <select name="produto[]">
                                    <option value="-1"></option>
                                    <!-- Pegando produtos -->
                                    <?php foreach ($produtos as $produto) { ?>
                                        <option <?= ($item[ 'produto' ] == $produto->ref) ? 'selected' : '' ?>
                                            value="<?= $produto->ref ?>" data-qtde="<?= $produto->qtdeMax ?>">
                                            <?= $produto->nome ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="qtde[]" value="<?= $item[ 'qtde' ] ?>" min="0"></td>
                        </tr>
                    <?php } ?>
                    <tr id="new_line">
                        <td>
                            <select name="produto[]" class="produtos">
                                <option value="-1"></option>
                                <!-- Pegando produtos -->
                                <?php foreach ($produtos as $produto) { ?>
                                    <option value="<?= $produto->ref ?>"
                                            data-qtde="<?= $produto->qtdeMax ?>"><?= $produto->nome ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="number" name="qtde[]" value="1" min="1" class="qtde"></td>
                    </tr>
                </tbody>
            </table>
        </form>

        <script src="../js/bases/jquery.2.min.js" type="text/javascript"></script>
        <script src="nav/scripts.js" type="text/javascript"></script>
    </body>
</html>