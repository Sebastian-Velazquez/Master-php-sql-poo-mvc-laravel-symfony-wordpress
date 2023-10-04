window.addEventListener("load", function(){
    //this.alert("La pagina esta completamente cargada!!")
    //$('body').css('background', 'red');
    
    //Boton de like
    $('btn-like').css('curso', 'pointer');
    $('btn-dislike').css('curso', 'pointer');

    $('btn-like').click(function(){
        this.alert("La pagina esta completamente cargada!!")
        $(this).addClass('btn-dislike').removeClass();
        $(this).attr('src', 'img/heart-red.png');
    });
});

