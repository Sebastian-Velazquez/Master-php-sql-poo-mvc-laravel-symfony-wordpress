var url = 'http://localhost/curso/laravel/public'

window.addEventListener("load", function(){
  
    //this.alert("jQuery funcionando")
    //$('body').css('background', 'red');
    console.log("jQuery funcionando");
    //Boton de like
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');
});

window.addEventListener("load", function(){
  $(document).on('click', '.likes .btn-dislike', function() {
      console.log("Like");
      $(this).hide(); // Oculta el icono regular
     $(this).siblings('.btn-like').show(); // Muestra el icono solid
      //mandar a guardar db
      $.ajax({
        url: url+'/like/'+$(this).data('id'),
        type: 'GET',
        success: function (response) { 
          if (response.like) {
            console.log('Se dio like correctamente!');
          } else {
            console.log('Error al dar like');
          }
        }
      });
  });
});

window.addEventListener("load", function(){
  $(document).on('click', '.likes .btn-like', function() {
      console.log("Dislike");
      $(this).hide(); // Oculta el icono solid
    $(this).siblings('.btn-dislike').show(); // Muestra el icono regular

      //mandar a guardar db
      $.ajax({
        url: url+'/dislike/'+$(this).data('id'),
        type: 'GET',
        success: function (response) { 
          if (response.deslike) {
            console.log('Se saco el like  correctamente!');
          } else {
            console.log('Error a sacar el like');
          }
         }
    });
  });


    //Buscador
    $('#buscador').submit(function(e){
      $(this).attr('action', url+'/gente/'+$('#buscador #search').val());
    })
});
