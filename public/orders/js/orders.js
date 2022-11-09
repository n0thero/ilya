window.order = {

  state: {
    hash_to_delete: null
  },

  page: {
    delete_button: $('.delete_button')
  },

  startDeleteOrder: function (hash) {
    getOrder().state.hash_to_delete = hash;
    getDataBase().updateData(getOrder().deleteOrderOnClick);
  },

  deleteOrderOnClick: function () {

    console.log('Начинаем сортировку');

    let filtered_data = getDataBase()
      .state
      .server_data
      .filter(function (item) {
        return item.hash !== getOrder().state.hash_to_delete;
      });

    console.log('Фильтрация закончена, начинаем ajax-запрос');

    $.ajax({
      method: 'post',
      url: '/orders/handlers/data_saver.php',
      data: {
        data_to_save: JSON.stringify(filtered_data)
      }
    })
      .done(function () {
        getDataBase().state.server_data = filtered_data;
      });
  }
}

function getOrder() {
  return window.order;
}

getOrder().page.delete_button.on(
  'click',
  function (event) {

    let clicked_button = $(event.target);

    getOrder().startDeleteOrder(clicked_button.attr('data-hash'));

    clicked_button
      .parents('tr')
      .remove();

    console.log('Заявка удалена');
  });