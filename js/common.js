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