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
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../favicon.ico" />
        <link rel="icon" href="../favicon.ico" />
    </head>
    <body>
        <div id="form-cotacao">
            <form id="cotacao" action="" method="post">
                <!-- MENSAGEM -->
                <?php if (! empty($cotacao[ 'msg' ])) { ?>
                    <div id="mensagem">
                        <div class="bloco msg <?= $cotacao[ 'erro' ] ? 'erro' : 'ok' ?>">
                            <p class="content"><?= $cotacao[ 'msg' ] ?></p>
                        </div>
                        <span class="divisoria"></span>
                    </div>
                <?php } ?>

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
                            <label for="ie">IE</label>
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

                        <div class="campo small">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" value="<?= $cotacao[ 'cidade' ] ?>">
                        </div>

                        <div class="campo small">
                            <label for="uf">Estado</label>
                            <select name="uf" id="uf">
                                <option></option>
                                <option <?= ($cotacao[ 'uf' ] == 'AC') ? 'selected' : '' ?>>AC</option>
                                <option <?= ($cotacao[ 'uf' ] == 'AL') ? 'selected' : '' ?>>AL</option>
                                <option <?= ($cotacao[ 'uf' ] == 'AM') ? 'selected' : '' ?>>AM</option>
                                <option <?= ($cotacao[ 'uf' ] == 'AP') ? 'selected' : '' ?>>AP</option>
                                <option <?= ($cotacao[ 'uf' ] == 'BA') ? 'selected' : '' ?>>BA</option>
                                <option <?= ($cotacao[ 'uf' ] == 'CE') ? 'selected' : '' ?>>CE</option>
                                <option <?= ($cotacao[ 'uf' ] == 'DF') ? 'selected' : '' ?>>DF</option>
                                <option <?= ($cotacao[ 'uf' ] == 'ES') ? 'selected' : '' ?>>ES</option>
                                <option <?= ($cotacao[ 'uf' ] == 'GO') ? 'selected' : '' ?>>GO</option>
                                <option <?= ($cotacao[ 'uf' ] == 'MA') ? 'selected' : '' ?>>MA</option>
                                <option <?= ($cotacao[ 'uf' ] == 'MG') ? 'selected' : '' ?>>MG</option>
                                <option <?= ($cotacao[ 'uf' ] == 'MT') ? 'selected' : '' ?>>MT</option>
                                <option <?= ($cotacao[ 'uf' ] == 'MS') ? 'selected' : '' ?>>MS</option>
                                <option <?= ($cotacao[ 'uf' ] == 'PA') ? 'selected' : '' ?>>PA</option>
                                <option <?= ($cotacao[ 'uf' ] == 'PB') ? 'selected' : '' ?>>PB</option>
                                <option <?= ($cotacao[ 'uf' ] == 'PE') ? 'selected' : '' ?>>PE</option>
                                <option <?= ($cotacao[ 'uf' ] == 'PI') ? 'selected' : '' ?>>PI</option>
                                <option <?= ($cotacao[ 'uf' ] == 'PR') ? 'selected' : '' ?>>PR</option>
                                <option <?= ($cotacao[ 'uf' ] == 'RJ') ? 'selected' : '' ?>>RJ</option>
                                <option <?= ($cotacao[ 'uf' ] == 'RN') ? 'selected' : '' ?>>RN</option>
                                <option <?= ($cotacao[ 'uf' ] == 'RS') ? 'selected' : '' ?>>RS</option>
                                <option <?= ($cotacao[ 'uf' ] == 'RO') ? 'selected' : '' ?>>RO</option>
                                <option <?= ($cotacao[ 'uf' ] == 'RR') ? 'selected' : '' ?>>RR</option>
                                <option <?= ($cotacao[ 'uf' ] == 'SC') ? 'selected' : '' ?>>SC</option>
                                <option <?= ($cotacao[ 'uf' ] == 'SE') ? 'selected' : '' ?>>SE</option>
                                <option <?= ($cotacao[ 'uf' ] == 'SP') ? 'selected' : '' ?>>SP</option>
                                <option <?= ($cotacao[ 'uf' ] == 'TO') ? 'selected' : '' ?>>TO</option>
                            </select>
                        </div>

                        <div class="campo small no-margin">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" value="<?= $cotacao[ 'telefone' ] ?>"
                                   placeholder="(99) 9999-9999" required>
                        </div>
                    </div>
                </div>

                <span class="divisoria"></span>

                <!-- Produtos -->
                <div class="bloco produtos">
                    <h3 class="title">Produtos</h3>
                    <div class="content">
                        <table id="produtos">
                            <thead>
                                <tr>
                                    <td width="90%">Produto</td>
                                    <td width="10%">Qtde</td>
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
                                                        value="<?= $produto->ref ?>"
                                                        data-qtde="<?= $produto->qtdeMax ?>">
                                                        <?= $produto->nome ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><input type="number" name="qtde[]" value="<?= $item[ 'qtde' ] ?>" min="0">
                                        </td>
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
                    </div>
                </div>

                <span class="divisoria"></span>

                <div class="bloco opcional">
                    <h3 class="title">Observações</h3>
                    <div class="content">
                        <textarea name="obs" id="obs"><?= $cotacao[ 'obs' ] ?></textarea>
                    </div>
                </div>

                <span class="divisoria"></span>

                <div class="bloco final">
                    <button class="btn enviar" type="submit">Enviar</button>
                </div>
            </form>
        </div>

        <script src="../js/bases/jquery.2.min.js" type="text/javascript"></script>
        <script src="../js/bases/mascara.js" type="text/javascript"></script>
        <script src="nav/scripts.js" type="text/javascript"></script>
    </body>
</html>