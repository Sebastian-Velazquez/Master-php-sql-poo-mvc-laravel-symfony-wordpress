var url = 'http://localhost/curso/laravel/public'

window.addEventListener("load", function(){
    //this.alert("jQuery funcionando")
    //$('body').css('background', 'red');
    console.log("jQuery funcionando");

    //Boton de like
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');


  $(document).ready(function() {
    $(".btn-like").click(function() {
    console.log("Dislike");
      $(".btn-like").hide(); // Oculta el icono solid
      $(".btn-dislike").show(); // Muestra el icono regular

      //mandar a guardar db
      $.ajax({
        url: url+'/dislike/'+$(this).data('id'),
        type: 'GET',
        success: function (response) { 
            console.log(response);
         }
      });

    });

    $(".btn-dislike").click(function() {
        console.log("Like");
      $(".btn-dislike").hide(); // Oculta el icono regular
      $(".btn-like").show(); // Muestra el icono solid
      
      //mandar a guardar db
      $.ajax({
        url: url+'/like/'+$(this).data('id'),
        type: 'GET',
        success: function (response) { 
            console.log(response);
         }
      });

    });
  });

} );