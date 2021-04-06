$("#ninguno").ready(mostrar_agregar);
$("#ninguno").change(mostrar_agregar);

function mostrar_agregar()
{
  if($("#ninguno").is(':checked'))
  {
    $('.agregar').hide();
    $('#tabla').hide();
  }
  else
  {
    $('.agregar').show();
    $('#tabla').show();
  }
}
<?php /**PATH C:\laragon\www\declarapat\resources\views/layouts/ninguno.blade.php ENDPATH**/ ?>