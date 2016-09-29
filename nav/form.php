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
        <div id="form-cotacao">
            <form id="cotacao" action="" method="post">
                <div class="msg"><?= $cotacao[ 'msg' ] ?></div>

                <!-- CAMPOS -->
                <div class="bloco pessoal">
                    <h3 class="title">Seus Dados</h3>
                    <div class="content">
                        <div class="campo small">
                            <label for="razao">Razão Social</label>
                            <input type="text" name="razao" id="razao" value="<?= $cotacao[ 'razao' ] ?>" required>
                        </div>

                        <div class="campo big no-margin">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?= $cotacao[ 'email' ] ?>" required>
                        </div>

                        <div class="campo small">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" value="<?= $cotacao[ 'cnpj' ] ?>" required>
                        </div>

                        <div class="campo small">
                            <label for="ie">Inscrição Estadual</label>
                            <input type="text" name="ie" id="ie" value="<?= $cotacao[ 'ie' ] ?>">
                        </div>

                        <div class="campo small">
                            <label for="tipo">Finalidade</label>
                            <select name="tipo" id="tipo">
                                <option <?= ($cotacao[ 'tipo' ] == 'Consumo' ? 'selected' : '') ?>>Consumo</option>
                                <option <?= ($cotacao[ 'tipo' ] == 'Revenda' ? 'selected' : '') ?>>Revenda</option>
                            </select>
                        </div>
                    </div>
                </div>

                <span class="divisoria"></span>

                <div class="bloco endereco">
                    <h3 class="title">Seu Endereço</h3>
                    <div class="content">
                        <div class="campo big">
                            <label for="rua">Rua</label>
                            <input type="text" name="rua" id="rua" value="<?= $cotacao[ 'rua' ] ?>">
                        </div>

                        <div class="campo small no-margin">
                            <label for="num">Número</label>
                            <input type="text" name="num" id="num" value="<?= $cotacao[ 'num' ] ?>">
                        </div>

                        <div class="campo small">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" value="<?= $cotacao[ 'cep' ] ?>">
                        </div>

                        <div class="campo big no-margin">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" value="<?= $cotacao[ 'bairro' ] ?>">
                        </div>

                        <div class="campo big">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" value="<?= $cotacao[ 'cidade' ] ?>">
                        </div>

                        <div class="campo small no-margin">
                            <label for="uf">Estado</label>
                            <input type="text" name="uf" id="uf" value="<?= $cotacao[ 'uf' ] ?>">
                        </div>

                        <div class="campo small">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" value="<?= $cotacao[ 'telefone' ] ?>" required>
                        </div>
                    </div>
                </div>

                <span class="divisoria"></span>

                <div class="bloco opcional">
                    <h3 class="title">Observação</h3>
                    <div class="content">
                        <textarea name="obs" id="obs"><?= $cotacao[ 'obs' ] ?></textarea>
                    </div>
                </div>

                <span class="divisoria"></span>

                <!-- Produtos -->
                <div class="bloco final">
                    <h3 class="title">Produtos</h3>
                    <div class="content">
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
                                            <option value=""></option>
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
                                        <option value=""></option>
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
                        <button class="btn enviar" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="../js/bases/jquery.2.min.js" type="text/javascript"></script>
        <script src="nav/scripts.js" type="text/javascript"></script>
    </body>
</html>