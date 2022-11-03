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

window.hacker = {

  page: {
    form: $('#order'),
  },

  submitForm: function () {

    let data_from_form = {
      name_user: $('#name_user').val(),
      idea: $('#idea').val(),
    };

    let now = new Date();

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
          + now.getMinutes()
    }, data_from_form);

    let data_to_send = typeof getDataBase().state.server_data.length !== 'undefined'
        ? getDataBase().state.server_data
        : [];

    data_to_send.push(new_order);

    getDataBase().sendData(data_to_send)
  },

}

function getHacker() {
  return window.hacker;
}

getHacker().page.form.on('submit', function (event) {
  event.preventDefault();
  getHacker().submitForm();
  alert('Заявка отправлена');
});


