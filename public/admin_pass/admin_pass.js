window.admin_pass = {

  page: {
    form: $('#authorization'),
    fields: {
      login: $('#login'),
      password: $('#password')
    }
  },

 /* submitForm: function () {

    let data_from_form = {
      login: $('#login').val(),
      password: $('#password').val(),
    };


  }*/

}

function getAdminPass() {
  return window.admin_pass;
}

getAdminPass().page.form.on('submit', function (event) {

  event.preventDefault();

  $.ajax({
    url: 'logged.php',
    method: 'post',
    data: {
      login: $('#login').val(),
      password: $('#password').val()
    }
  })
    .done(data => {

      if (data.status === 'success') {
        alert(data.message);
        location.reload();
      }
    });

});