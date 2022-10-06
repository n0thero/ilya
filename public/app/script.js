window.vault = {

  state: {
    server_data: server_data,
    last_created_user_hash: null
  },

  page: {
    form: $('#biology'),
    buttons: {
      clear_database: $('#clear_button'),
      delete_last_added: $('#delete_last_person')
    }
  },

  postUpdateFunction: null,

  startDeleteLastUserByHash: function () {
    if (getVault().state.last_created_user_hash) {
      getVault().updateData(getVault().deleteLastUserByHash);
    }
  },

  deleteLastUserByHash: function (){
    /*
    - получить данные пользователей
    - отфильтровать пользователей по уникальному ключу
    - удалить выбранного человека
    - загрузить измененные данные
     */
    // getVault().server_data.filter(loser => )

    let filtered_data = getVault()
      .state
      .server_data
      .filter(function (item) {
        return item.hash !== getVault().state.last_created_user_hash
      });

    $.ajax({
      method: 'post',
      url: 'data_saver.php',
      data: {
        data_to_save: JSON.stringify(filtered_data)
      }
    })
      .done(function (data) {
        getVault().state.server_data = filtered_data;
      });

  },

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
        getVault().server_data = your_object;
      });
  },

  updateData: function (function_to_do_later = null) {
    console.log(function_to_do_later)
    if(typeof function_to_do_later === 'function') {
      getVault().postUpdateFunction = function_to_do_later;
    } else {
      getVault().postUpdateFunction = null
    }

    $.ajax({
      method: 'get',
      url: 'app_data.json'
    })
      .done(function (data) {

        getVault().server_data = data;

        if (typeof getVault().postUpdateFunction === 'function') {
          getVault().postUpdateFunction()
        }

      });
  },

  submitForm: function () {

    let data_from_form = {
      firstname: $('#input1').val(),
      lastname: $('#input2').val(),
      age: +$('#input3').val(),
      sex: $('#input_sex').val(),
      special: $('#input_description').val()
    };

    let new_people = Object.assign( {
      hash: String(Math.random())
        .replace('0.', '')
        .substring(0, 7)
    }, data_from_form);

    getVault().state.last_created_user_hash = new_people.hash;

    let data_to_send = typeof getVault().state.server_data.length !== 'undefined'
      ? getVault().state.server_data
      : [];

    data_to_send.push(new_people);

    getVault().sendData(data_to_send)
  },

}

function getVault() {
  return window.vault;
}

getVault().page.form.on('submit', function (event) {
  event.preventDefault();
  getVault().submitForm();
  alert('User added');
});

getVault().page.buttons.delete_last_added.on('click', function () {
  getVault().startDeleteLastUserByHash()
});

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


