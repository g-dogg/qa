$(document).ready(function() {
    Materialize.updateTextFields();

  $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');

  });

function getData(formObject) {
    var hData = [];
    $('input, textarea,select', formObject).each(function() {
      if(this.name && this.name !== '') {
        hData[this.name] = this.value;
        console.log('hData[' + this.name + ']=' + hData[this.name]);
      }
    });
    return hData;
  };

function sendMsg() {
  var postData = getData('#form');
    /*var login = $('#username').val();
    var pwd = $('#password').val();
    var postData = "username="+login+"&password="+pwd;
*/

    $.ajax({
                    type: 'POST',
                    cache: false,
                    async: false,
                    url: "index.php",
                    data: postData,
                    dataType: 'json',
                    success: function(data) {
                        if(data['success']) {
                            alert('Success');
                      }
                      else {
                            alert(data['message']);
                      }
                  }
            });/**/
};