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

  state: {
    server_data: server_data,
    hash_to_delete: null
  },

  page: {
    form: $('#order'),
    button: $('.delete_button')
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

    let data_to_send = typeof getHacker().state.server_data.length !== 'undefined'
        ? getHacker().state.server_data
        : [];

    data_to_send.push(new_order);

    getHacker().sendData(data_to_send)
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

getHacker().page.button.on(
    'click',
    function (event) {

      let clicked_button = $(event.target);

      getOrder().startDeleteOrder(clicked_button.attr('data-hash'));

      clicked_button
          .parents('tr')
          .remove();

      console.log('Заявка удалена');
    });
