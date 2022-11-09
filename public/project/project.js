$('#project_form').on('submit', event => {
  event.preventDefault();

  $.ajax({
    method: 'post',
    url: 'project_saver.php',
    data: {
      message: $('[name = "project_text"]').val(),
      age: $('[name = "age"]').val(),
      info: $('[name = "textarea"]').val()
    }
  })
    .done(data => {

      if (typeof data.status !== 'undefined' &&
        data.status === 'success') {
        console.log('вы здесь 1');
        console.log('ура!');
      } else if(data.status === 'failed') {
        alert(data.alarm)
        console.log('вы здесь 2');
      }
    })
    .fail(() => {
      console.log('вы здесь 3');
      showError();
    });
});

function showError() {
  console.log('что-то пошло не так');
}


// setInterval(() => {
//
//   $.ajax({
//     method: 'post',
//     url: 'project_saver.php',
//     data: {
//       message: 'Опять рандомное число: ' + Math.floor((Math.random() * 10))
//     }
//   })
//
// }, 1000)




