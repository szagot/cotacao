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

        $( '.produtos' )
            .unbind( 'change' );

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

})( document, jQuery );