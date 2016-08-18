function getData(formObject) {
    var hData = [];
    $('input, textarea, select', formObject).each(function() {
      if(this.name && this.name !== '') {
        hData[this.name] = this.value;
        console.log('hData[' + this.name + ']=' + hData[this.name]);
      }
    });
    return hData;
  };

function ajax() { //Ajax отправка формы
  //var msg = $("#form").serialize();
  var postData = getData('#form')
  $.ajax({
    type: "POST",
    url: "index.php",
    data: postData,
    success: function(data) {
      //$("#results").html(data);
      alert(postData);
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

