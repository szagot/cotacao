<?php
require_once '../config/conecta.class.php';

/** @var array $cotacao Base de dados dos campos da cotação */
$cotacao = [
    // Mensagem do sistema
    'msg'      => '',
    'erro'     => false,

    // Campos
    'razao'    => '',
    'email'    => '',
    'cnpj'     => '',
    'ie'       => '',
    'tipo'     => 'Consumo',
    'cep'      => '',
    'rua'      => '',
    'num'      => '',
    'bairro'   => '',
    'cidade'   => '',
    'uf'       => '',
    'telefone' => '',
    'obs'      => '',

    // Produtos
    'itens'    => [],
];

/** @var array $cotacaoRaw Base limpa para zerar campos em caso de sucesso */
$cotacaoRaw = $cotacao;

/** @var Conecta $pdo */
$pdo = new Conecta();

// Teve postagem?
if (isset($_POST[ 'email' ])) {
    // Pegando campos
    $cotacao[ 'email' ] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cotacao[ 'razao' ] = filter_input(INPUT_POST, 'razao');
    $cotacao[ 'cnpj' ] = filter_input(INPUT_POST, 'cnpj');
    $cotacao[ 'ie' ] = filter_input(INPUT_POST, 'ie');
    $cotacao[ 'tipo' ] = filter_input(INPUT_POST, 'tipo');
    $cotacao[ 'cep' ] = filter_input(INPUT_POST, 'cep');
    $cotacao[ 'rua' ] = filter_input(INPUT_POST, 'rua');
    $cotacao[ 'num' ] = filter_input(INPUT_POST, 'num');
    $cotacao[ 'bairro' ] = filter_input(INPUT_POST, 'bairro');
    $cotacao[ 'cidade' ] = filter_input(INPUT_POST, 'cidade');
    $cotacao[ 'uf' ] = filter_input(INPUT_POST, 'uf');
    $cotacao[ 'telefone' ] = filter_input(INPUT_POST, 'telefone');
    $cotacao[ 'obs' ] = filter_input(INPUT_POST, 'obs');

    $produtosNome = $_POST[ 'produto' ];
    $produtosQtde = $_POST[ 'qtde' ];

    foreach ($produtosNome as $index => $ref) {
        if (! empty($ref)) {
            $qtde = $produtosQtde[ $index ];
            $cotacao[ 'itens' ][ $index ] = [
                'produto' => $ref,
                'qtde'    => ($qtde > 0) ? $qtde : 1
            ];
        }
    }

    // Verificando dados básicos e personalizando mensagens
    if (empty($cotacao[ 'email' ])) {
        $cotacao[ 'msg' ] = 'Você deve informar um email válido para podermos entrar em contato.';
        $cotacao[ 'erro' ] = true;
    }
    if (empty($cotacao[ 'razao' ]) || empty($cotacao[ 'cnpj' ])) {
        $cotacao[ 'msg' ] = 'Por favor, nos informe os dados de sua empresa.<br>' .
            '<small>Razão Social e CNPJ</small>';
        $cotacao[ 'erro' ] = true;
    }
    if (empty($cotacao[ 'itens' ]) && empty($cotacao[ 'obs' ])) {
        $cotacao[ 'msg' ] = 'Por favor, selecione pelo menos 1 produto para o qual quer fazer a cotação, ' .
            'ou deixe uma mensagem em <b>observações</b> relatando sua necessidade.';
        $cotacao[ 'erro' ] = true;
    }

    // Se não houveram erros...
    if (! $cotacao[ 'erro' ]) {
        // Configurando envio de email
        // Email de origem (tem que ser um @aiha.com.br)
        $emailOrigem = 'sac@aiha.com.br';

        // Email para onde será enviado
        $emailDestino = 'daniel@tmw.com.br';

        // Montando tabela de produtos
        $produtos =
            '<table border="1" cellpadding="5" cellspacing="1"><thead><tr>' .
            '<td><b>Ref</b></td>' .
            '<td><b>Produto</b></td>' .
            '<td align="center"><b>Qtde</b></td>' .
            '</tr></thead><tbody>';

        foreach ($cotacao[ 'itens' ] as $produto) {
            $nomeProd =
                $pdo->execute("SELECT PRO_NOME FROM produto WHERE PRO_REF = '{$produto['produto']}'", true)->PRO_NOME;
            $produtos .=
                "<tr>" .
                "<td>{$produto['produto']}</td>" .
                "<td>{$nomeProd}</td>" .
                "<td align='center'>{$produto['qtde']}</td>" .
                "</tr>";
        }

        $produtos .= '</tbody></table>';

        // Mensagem email
        $msgMail = utf8_decode(preg_replace('/[\n\r\s\t]+/', ' ',
            "<html><body>
                <p><big><b>Formulário de Cotação</b></big></p>
                <p>
                    <b>Email de Contato: </b> {$cotacao[ 'email' ]}<br>
                    <b>Razão Social: </b> {$cotacao[ 'razao' ]}<br>
                    <b>CNPJ: </b> {$cotacao[ 'cnpj' ]}<br>
                    <b>IE: </b> {$cotacao[ 'ie' ]}<br>
                    <b>Finalidade: </b> {$cotacao[ 'tipo' ]}<br>
                    <b>CEP: </b> {$cotacao[ 'cep' ]}<br>
                    <b>Rua: </b> {$cotacao[ 'rua' ]}<br>
                    <b>Número: </b> {$cotacao[ 'num' ]}<br>
                    <b>Bairro: </b> {$cotacao[ 'bairro' ]}<br>
                    <b>Cidade: </b> {$cotacao[ 'cidade' ]}<br>
                    <b>Estado: </b> {$cotacao[ 'uf' ]}<br>
                    <b>Telefone: </b> {$cotacao[ 'telefone' ]}
                </p><p>
                    <b>Observações: </b> {$cotacao[ 'obs' ]}
                </p>
                <p><big><b>Produtos Selecionados:</b></big></p>
                $produtos
                <br><hr>
                <p><small>Email enviado de 
                    <a href='https://www.aiha.com.br/cotacao/' target='_blank'>Cotação Aiha Lâmpadas</a></small></p>
            </body></html>"
        ));

        // Setando o envio de email
        require_once 'config/PHPMailer/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->setFrom($emailOrigem, $cotacao[ 'razao' ]);
        $mail->addReplyTo($cotacao[ 'email' ]);
        $mail->addAddress($emailDestino);
        $mail->Subject = utf8_decode("Formulário de Cotação Aiha Lâmpadas| {$cotacao[ 'razao' ]} <{$cotacao[ 'email' ]}>");
        $mail->msgHTML($msgMail);

        // Foi enviado?
        if (! $mail->send()) {
            $cotacao[ 'erro' ] = true;
            $cotacao[ 'msg' ] =
                'Não foi possível enviar sua cotação no momento!<br><small>Tente novamente mais tarde.<br>' .
                '<br>Obrigado!</small>';
        } else {
            // Zerando envios e colocando mensagem de sucesso
            $cotacao = $cotacaoRaw;
            $cotacao[ 'msg' ] =
                'Sua cotação foi enviada com sucesso!<br><small>Por favor, aguarde nosso retorno.<br>' .
                '<br>Obrigado!</small>';
        }
    }

}

// Pegando produtos disponíveis
$produtos = $pdo->execute('
    SELECT
      PRO_REF AS ref,
      PRO_NOME AS nome,
      PRO_ESTOQUE AS qtdeMax
    FROM produto
    WHERE PRO_ATIVO = 1 AND SUB_PRO_ID IS NULL AND PRO_ESTOQUE > 0
    ORDER BY PRO_NOME, PRO_REF
');

// Montando form
require_once 'nav/form.php';
exit;