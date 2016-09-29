<?php
require_once '../config/conecta.class.php';

$cotacao = [
    // Mensagem do sistema
    'msg'      => '',

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
    'itens'    => [
        [
            'produto' => 'AH-3528-IP65-60-12-VO',
            'qtde'    => 3
        ],
        [
            'produto' => 'KIT-AH-3528-IP65-60-12-6500',
            'qtde'    => 5
        ],
    ],
];

// Pegando produtos disponíveis
$produtos = (new Conecta('produto'))->execute('
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


/*

 // Email de origem (tem que ser um @aiha.com.br)
$emailOrigem = 'sac@aiha.com.br';

// Email para onde será enviado
$emailDestino = 'kaled@aiha.com.br';

// Mensagem email
$msgMail = preg_replace('/[\n\r\s\t]+/', ' ',
    "<html><body>
        <p>Olá, gostaria de saber qual a melhor lâmpada para meu ambiente.</p>
        <p>
            <strong>Nome: </strong> $nomeCliente<br>
            <strong>Email:</strong> $emailCliente<br>
            <strong>Mensagem:</strong> $msgCliente
        </p>
        <p>Email enviado de <a href='https://www.aiha.com.br/qlamp/' target='_blank'>Qual é a lâmpada</a> <small>(Imagem em anexo)</small>)</p>
    </body></html>"
);

// Setando o envio de email
require_once 'PHPMailer/class.phpmailer.php';
$mail = new PHPMailer();
$mail->setFrom($emailOrigem, $nomeCliente);
$mail->addReplyTo($emailCliente);
$mail->addAddress($emailDestino);
$mail->Subject = "Qual a melhor foto para meu ambiente? | $nomeCliente <$emailCliente>";
$mail->msgHTML($msgMail);
$mail->addAttachment($foto[ 'tmp_name' ], $foto[ 'name' ]);

// Foi enviado?
if (! $mail->send()) {
    Saida::json('Desculpe-nos, não foi possível enviar sua imagem no momento.' . PHP_EOL . 'Tente novamente mais tarde',
        true);
}

 */