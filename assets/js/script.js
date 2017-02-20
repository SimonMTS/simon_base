$( document ).ready(function() {
    $('span.hamburg').click(function(){
        $('header#head a').toggle();
    });

    $( window ).resize(function(){
        $('header#head a').show();
    })
});
