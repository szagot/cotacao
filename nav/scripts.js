(function(d, $){

    // Pega a linha em branco
    var getNewLine = $('#new_line');

    // Duplicador de linha
    var duplicaLinha = function(linha) {
        $('#produtos')
            .find('tbody')
            .eq(0)
            .append( '<tr>' + linha.html() + '</tr>' );
    };

    // Duplica a linha em caso de mudança
    getNewLine
        .find('.produtos')
        .change(function() {
            duplicaLinha(getNewLine);
        });

})(document, jQuery);