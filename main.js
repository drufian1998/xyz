function loadCSS() {
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'styles.css';
    document.head.appendChild(link);
  }
  
  window.addEventListener('load', loadCSS);

  function mostrarFormularioActualizar(id, nombre, email) {
    document.querySelector("input[name='actualizar_id']").value = id;
    document.querySelector("input[name='nombre_actualizar']").value = nombre;
    document.querySelector("input[name='email_actualizar']").value = email;
  }
  
  function eliminarUsuario(id, email) {
    if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
      document.querySelector("input[name='eliminar_id']").value = id;
      document.querySelector("input[name='email_eliminar']").value = email;
      document.querySelector("form[action='eliminar_usuario.php']").submit();
    }
  }

  $(document).ready(function(){
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('body,html').animate({
                scrollTop: $(hash).offset().top
            }, 1200, function(){
                window.location.hash = hash;
            });
        } 
    });
});

var width = $(window).width(); 

window.onscroll = function(){
    if ((width >= 900)){
        if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            $("#middle").css("background-size","150% auto");
        }else{
            $("#middle").css("background-size","100% auto");        
        }
    }
};

setTimeout(function(){
    $("#loading").addClass("animated fadeOut");
    setTimeout(function(){
        $("#loading").removeClass("animated fadeOut");
        $("#loading").css("display","none");
    },800);
},1450);
