$('#add_form').on('submit', event => {
  event.preventDefault();


  $.ajax({
    method: 'post',
    url: 'add_dynamic.php',
    data: {
      name: $('#name').val(),
      sex: $('#sex').val()
    }
  })
      .done(data => {
            if (data.status === 'success') {
              alert('Заявка отправлена')
            }
          }
      )
})

$('.delete_button').on(
    'click',
    function (event) {

    })
