$('#add_form').on('submit', event => {
  event.preventDefault();

  let new_data = {
    name: $('#name').val(),
    special: $('#special').val(),
  };

  let ajax_params = {
    method: 'post',
    url: 'add_dynamic.php',
    data: new_data
  };

  $.ajax(ajax_params)
    .done(response => {
        if (response.status === 'success') {
          alert('Заявка отправлена');
          $('.info_table tbody').append(
            '<tr class="table_list">' +
            '<td>' +
            new_data.name +
            '</td>' +
            '<td>' +
            new_data.special +
            '</td>' +
            '<td>' +
            '--' +
            '</td>' +
            '<td>' +
            '<button class="delete_button" data-hash="' + response.hash + '">' +
            'Удалить</button>' +
            '</td>' +
            '</tr>');

          $('.info_table').show();

          bindListenersForDeletingButtons();
        }
      }
    )
})

$('[name="speciality"]').on('change', event => {

  let clicked_select = $(event.target);

  $.ajax({
    method: 'get',
    url: '/dynamic/get_users_by_speciality.php',
    data: {
      special: clicked_select.val()
    }
  })
    .done(response => {
      if (response.status === 'success') {

        $('[name="unique_user_key"]').html('<option disabled selected>Не выбрано</option>');

        response.result.forEach(user => {
          let option = '<option value="' + user.hash + '">' + user.name + '</option>';
          $('[name="unique_user_key"]').append(option);
        });

        $('.hash-wrap').show();

      }
    });

});

function bindListenersForDeletingButtons() {

  $('.delete_button')
    .off()
    .on('click', function (event) {

      let clicked_button = $(event.target);

      $.ajax({
        method: 'post',
        url: '/dynamic/del_dynamic.php',
        data: {
          hash: clicked_button.attr('data-hash')
        }
      })
        .done(data => {
          if (data.status === 'success') {
            clicked_button.parents('tr').remove();
            if ($('.table_list').length === 0) {
              $('.info_table').hide()
            }
            console.log('Поле удалено')
          }
        })
    })
}

bindListenersForDeletingButtons();
