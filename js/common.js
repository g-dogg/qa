function ajax() { //Ajax отправка формы
  var msg = $("#form").serialize();
  $.ajax({
    type: "POST",
    url: "index.php",
    data: msg,
    success: function(data) {
      //$("#results").html(data);
      alert("Success " + msg);
    },
    error:  function(xhr, str){
      alert("Возникла ошибка!");
    }
  });
}

jQuery.fn.notExists = function() { //Проверка на существование элемента
  return $(this).length == 0;
}
$(document).ready(function() {
    Materialize.updateTextFields();
      $('input.theme').autocomplete({
    data: {
      "Apple": null,
      "Microsoft": null,
      "Google": 'http://placehold.it/250x250'
    }
  });

  $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');

  });

