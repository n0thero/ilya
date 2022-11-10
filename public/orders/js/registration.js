window.registration = {

  page: {
    form: $('#registration'),
    fields: {
      firstname: $('#firstname'),
      login: $('#login'),
      password: $('#password')
    }
  },

}

function getRegData() {
  return window.registration;
}

getRegData().page.form.on('submit', function (event) {

  event.preventDefault();

  $.ajax({
    url: '/orders/handlers/register.php',
    method: 'post',
    data: {
      firstname: $('#firstname').val(),
      login: $('#login').val(),
      password: $('#password').val()
    }
  })
    .done(data => {
      if (data.status === 'success') {
        alert(data.message);
        location.href = 'order_list.php';
      } else if (data.status === 'failed') {
        alert(data.message)
      }
    })
    .fail(() => {
      alert('Что-то пошло не так');
    });
});