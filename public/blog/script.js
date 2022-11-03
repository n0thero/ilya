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

window.blog = {

  state: {
    server_data: server_data,
    last_created_story_hash: null
  },

  page: {
    form: $('#blog_body'),
    buttons: {
      clear_database: $('#clear_button'),
      delete_last_added: $('#delete_last_person')
    }
  },

  postUpdateFunction: null,

  time_post: null,


  // startDeleteLastUserByHash: function () {
  //   if (getBlog().state.last_created_user_hash) {
  //     getBlog().updateData(getVault().deleteLastUserByHash);
  //   }
  // },

  // deleteLastUserByHash: function (){
  //   /*
  //   - получить данные пользователей
  //   - отфильтровать пользователей по уникальному ключу
  //   - удалить выбранного человека
  //   - загрузить измененные данные
  //    */
  //   // getBlog().server_data.filter(loser => )
  //
  //   let filtered_data = getBlog()
  //     .state
  //     .server_data
  //     .filter(function (item) {
  //       return item.hash !== getBlog().state.last_created_user_hash
  //     });
  //
  //   $.ajax({
  //     method: 'post',
  //     url: 'data_saver.php',
  //     data: {
  //       data_to_save: JSON.stringify(filtered_data)
  //     }
  //   })
  //     .done(function (data) {
  //       getBlog().state.server_data = filtered_data;
  //     });
  //
  // },

  sendData: function (your_object) {

    if (!your_object) {
      return;
    }

    $.ajax({
      method: 'post',
      url: 'data_saver.php',
      data: {
        data_to_save: JSON.stringify(your_object)
      }
    })
        .done(function (data) {
          getBlog().state.server_data = your_object;
        });
  },

  updateData: function (function_to_do_later = null) {

    if (typeof function_to_do_later === 'function') {
      getBlog().postUpdateFunction = function_to_do_later;
    } else {
      getBlog().postUpdateFunction = null
    }

    $.ajax({
      method: 'get',
      url: 'app_data.json'
    })
        .done(function (data) {

          getBlog().state.server_data = data;

          if (typeof getBlog().postUpdateFunction === 'function') {
            getBlog().postUpdateFunction()
          }

        });
  },

  submitForm: function () {

    let data_from_form = {
      blog_name: $('#blog_name').val(),
      story: $('#story').val(),
    };

    let new_story = Object.assign({
      hash: String(Math.random())
          .replace('0.', '')
          .substring(0, 7),
      time_post: getBlog().time_post.getDate()
          + '.'
          + months[getBlog().time_post.getMonth()]
          + '.'
          + getBlog().time_post.getFullYear()
          + ' / '
          + getBlog().time_post.getHours()
          + ':'
          + getBlog().time_post.getMinutes()
    }, data_from_form);

    getBlog().state.last_created_story_hash = new_story.hash;

    let data_to_send = typeof getBlog().state.server_data.length !== 'undefined'
        ? getBlog().state.server_data
        : [];

    data_to_send.push(new_story);

    getBlog().sendData(data_to_send)
  },

}

function getBlog() {
  return window.blog;
}

getBlog().time_post = new Date();

getBlog().page.form.on('submit', function (event) {
  event.preventDefault();
  getBlog().submitForm();
  alert('Форма отправлена');
});

getBlog().page.buttons.delete_last_added.on('click', function () {
  getBlog().startDeleteLastUserByHash()
});

function showBlog() {

  window.server_data.map(blog => {

    $('body').append('<div>' +
        '<h2>' + blog.blog_name + '</h2>' +
        '<p>' + blog.story + '</p>' +
        '<p>' + blog.time_post + '</p>' +
        '</div>')
  });

}

showBlog()
/*let newBlog = document.createElement('div'),
    h2 = document.createElement('h2'),
    p = document.createElement('p');

h2.textContent = $.ajax({
  method: 'get',
  url: 'app_data.json'
})
    .done(function ());

p.textContent = 'story';

document.body.appendChild(newBlog)
newBlog.appendChild(h2)
newBlog.appendChild(p)*/


{ // ПОДСКАЗКИ
  let somebody;

  somebody = $('.small-red') // найти по классу
  somebody = $('.big-red.dirty') // 2 класса сразу

  somebody.hasClass('big-red') // bool - есть ли такой класс?

  somebody = $('#biology') // получить по id

// $.ajax(params) - вызвать ajax запрос с параметрами

  somebody = $('body') // найти по тегу

  somebody.append('<div>You lucky</div>') // добавить в конце элемента новый html

  somebody = $('ul .small-red') // через пробел - поиск наследника с указанием родителя

//let ninja = document.getElementById('ninja');

  /*ninja.addEventListener('click', function () {
    console.log('i am ninja!');
  });*/

  $('ul #ninja').on('click', function () { // просто другая запись
    console.log('i am ninja!');
  });

  $('#cool-form').on('submit', function (event) { // повесить прослушку на отправку форму
    event.preventDefault(); // отменить перезагрузку страницы
    console.log('something else')

    let input = $('#some_input'); // получить инпут
    let value = input.val() // $('#some_input').val() - получить его значение

    console.log(value)

    let data_for_server = {
      brand: value
    }


    input.val('') // Задать новое значение для поля
  })

// location.reload() - перезагрузить страницу

  function showListOfUsers() {
    // перебрать все данные с сервера, и для каждого из них
    // выполнить что-то

    server_data.map(item => {
      console.log(item)
      $('body').append('<div>' + item.name + '</div>')
    })
  }

// showListOfUsers();
} // подсказки

// .on('submit', function (event) {
//   getVault().page.form.on('submit', function (event) {

// Ctrl + пробел = показать варианты того что можно напечатать дальше


