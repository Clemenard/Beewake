$(document).ready(function(){

$('#import').click(function(){
  email=$('#email').val()
  $.ajax({
    url: 'formCall.php?email='+email,
    method: 'get',
    dataType: 'json',
    success: function(request){
      if(request!==false){
        $('#danger').hide()
    $('#first_name').val(request.first_name)
    $('#last_name').val(request.last_name)
    $('#avatar').val(request.avatar)}
    else{
      $('#danger').show().html("Cet utilisateur n'existe pas chez notre partenaire")
    }
    }
  });
})
  })
