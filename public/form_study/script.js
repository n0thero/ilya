window.globalForm = {

  state: {
    server_data: server_data,
    data_from_form: null
  },

  page: {
    form: $('#personal_data'),
  },

  submitForm: function () {

    let data_from_form = {
      name: $('#name').val(),
      email: $('#email').val(),
      phone: $('#phone').val()
    };

    getForm().state.data_from_form = data_from_form;

    let data_to_send = typeof getForm().state.server_data.length !== 'undefined'
      ? getForm().state.server_data
      : [];
    
    getForm().sendData(data_to_send)
  },


}

function getForm() {
  return window.globalForm;
}

getForm().page.form.on('submit', function (event) {
  event.preventDefault();
  getForm().submitForm();
  alert('Форма отправлена');
});