window.months = [
  'Января',
  'Февраля',
  'Марта',
  'Апреля',
  'Мая',
  'Июня',
  'Июля',
  'Августа',
  'Сентября',
  'Октября',
  'Ноября',
  'Декабря'
]

window.orders = {

  page: {
    form: $('#order'),
  },



  submitForm: function () {

    let data_from_form = {
      name_user: $('#name_user').val(),
      idea: $('#idea').val(),
    };

    let now = new Date();

    let minutes = now.getMinutes() < 10
      ? '0' + now.getMinutes()
      : now.getMinutes();

    let new_order = Object.assign({
      hash: String(Math.random())
        .replace('0.', '')
        .substring(0, 7),
      time_order: now.getDate()
        + '.'
        + months[now.getMonth()]
        + ' / '
        + now.getHours()
        + ':'
        + minutes
    }, data_from_form);

    $.ajax({
        method: 'post',
        url: '/orders/handlers/data_saver.php',
        data: new_order
      })
      .done(data => {
        if (data.status === 'success') {
          alert('Ваша заявка отправлена')
        }}
      )
  },

}

function getNewOrder() {
  return window.orders;
}

getNewOrder().page.form.on('submit', function (event) {
  event.preventDefault();
  getNewOrder().submitForm();
});


