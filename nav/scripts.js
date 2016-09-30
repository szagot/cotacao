(function ( d, $ ) {

    // Pega a linha em branco
    var getNewLine = $( '#new_line' );

    var index = 0;

    // Duplicador de linha
    var duplicaLinha = function ( linha ) {
        $( '#produtos' )
            .find( 'tbody' )
            .eq( 0 )
            .append( '<tr id="pro_' + index + '">' + linha.html() + '</tr>' );

        // Remove a ação de mudança de todos os selects
        $( '.produtos' )
            .unbind( 'change' );

        // Recoloca a ação de mudança apenas no select criado
        $( '#pro_' + index )
            .find( '.produtos' )
            .bind( 'change', function () {
                duplicaLinha( getNewLine );
            } );

        index++;
    };

    // Duplica a linha em caso de mudança
    getNewLine
        .find( '.produtos' )
        .bind( 'change', function () {
            duplicaLinha( getNewLine );
        } );

    // Máscaras
    $( '#cep' ).mask( '99999-999' );
    $( '#cnpj' ).mask( '99.999.999/9999-99' );
    $( '#telefone' ).mask( '(99) 9999-9999?9' );

    // Ação para quando há mensagem
    var msg = $( '#mensagem' );
    // Se houver msg e se a mensagem for de OK
    if ( msg.length && msg.find('.ok').length ) {
            setTimeout(function(){
                msg.slideUp('slow');
            }, 3000);
    }

})( document, jQuery );