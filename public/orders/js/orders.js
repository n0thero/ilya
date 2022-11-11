window.order = {

  page: {
    delete_button: $('.delete_button')
  },

}

function getOrder() {
  return window.order;
}

getOrder().page.delete_button.on(
  'click',
  function (event) {

    let clicked_button = $(event.target);

    let table = $('.orders_table');


    $.ajax({         //создаю аякс запрос
      method: 'post',    // данный метод отправляет данные в файл
      url: '/orders/handlers/delete_order.php',
      data: {
        hash: clicked_button.attr('data-hash')
      }
    })
      .done(data => {                      // если статус успешно - то пишет в консоли, что заявка удалена
          if (data.status === 'success') {

            clicked_button.parents('tr').remove();

            console.log($('.table_list').length);

            if ($('.table_list').length === 0) {
              table.hide();
              $('.no_orders').show();
            }
            console.log('Заявка удалена')
          }
        }
      )


    //getOrder().startDeleteOrder(clicked_button.attr('data-hash'));

    //clicked_button
    //.parents('tr')
    // .remove();
    //
    // console.log('Заявка удалена');
  });