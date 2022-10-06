function first() { // начинает весь процесс, и инициирует аякс-запрос
  makeAjaxRequest(window.second); // отправить переменную которая содержит функцию в аякс-запрос
}

// происходит после аякс-запроса, если она была ему передана. Это происходит в first
window.second = function (data_from_request) {
  // window.sorted_data = data_from_request.sort(бла-бла-бла) // Пример того, что можно сделать с данными
}

// Вызывает аякс-запрос, и после него может выполнить переданную функцию из параметра function_to_do_later.
// Но эту функцию передавать необязательно и в таком случае после аякс-запроса покажется просто вывод в консоль.
function makeAjaxRequest(function_to_do_later = null) {

  if (typeof function_to_do_later === 'function') {
    window.function_after_ajax = function_to_do_later;
  } else {
    window.function_after_ajax = null;
  }

  // данные вызова аякс запроса нас не интересуют в рамках задачи
  $.ajax({
    url: '/get-data/',
    method: 'get'
  })
    .done(ajax_result_data => {

      if (typeof window.function_after_ajax === 'function') {
        window.function_after_ajax(ajax_result_data); // выполнится только если в глобальной переменной лежит функция
      } else {
        console.log(ajax_result_data);
      }
    });
}

first(); // вызывает аякс-запрос, а потом ещё одну функцию
makeAjaxRequest(); // просто так вызывает аякс-запрос, и потом просто показывает лог в консоли

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

// при загрузке страницы в html был указан объект с данными
window.horses = [
  {
    id: 15,
    name: 'Таисия',
    is_available: true
  },
  {
    id: 27,
    name: 'Плотва',
    is_available: false
  }
];

// сохраняем список уже показанных лошадей
window.horses_ids = [];

// показывает на странице список лошадей из данных, которые есть при загрузке страницы
showHorses();

function showHorses() {

  window.horses.map(horse => {

    // здесь мы проверим, была ли лошадь показана
    // работаем с этой переменной window.horses_ids
    // если показана, то не выполняем это
    // let horse_was_shown = блаблабла
    // if (horse_was_shown) { return; }

    $('body').append('<div onclick="reserveHorse(' + horse.id + ')">Имя: ' + horse.name + '</div>');
    window.horses_ids.push(horse.id)
  });
}

/*
<body>
  <div onclick="reserveHorse(15)>Таисия</div>
  <div onclick="reserveHorse(27)>Плотва</div>
</body>
 */

// позволяет пользователю забронировать лошадь

function reserveHorse(horse_id_to_reserve) {

  window.horse_id_to_reserve = horse_id_to_reserve;

  $.ajax({
    url: '/horses/',
    method: 'get'
  })
    .done(data_about_horses => {
      window.horses = data_about_horses // приходит массив такой же структуры, как и раньше, но с другими элементами
      showHorses();

      /*
      Только сейчас мы знаем актуальную информацию о том, что лошадь свободна или занята.
      Только теперь мы можем отправить запрос на её бронирование.
       */

      /*
      * Здесь код, который ищет лошадь в общем массиве и уточняет свободна ли она.
      * Использует глобальную переменную window.horse_id_to_reserve
      * В зависимости от доступности выполняется разный код.
      *
      * let horse_is_available = ...
      * */
      let horse_is_available = true; // просто для примера

      if (!horse_is_available) {
        alert('Лошадь №' + window.horse_id_to_reserve + ' недоступна')
      } else {

        $.ajax({
          url: '/reserve-horse',
          method: 'post', // post = метод для отправки данных и их сохранения в базе, а не просто получение чего-то
          data: {
            horse_id: horse_id_to_reserve
          }
        })
          .done(data_about_reserve => {
            if (data_about_reserve.status === 'success') {
              alert('Лошадь забронирована')
            } else {
              alert('Не удалось забронировать лошадь')
            }
          }) // мы знаем, что с сервера обязательно придёт объект с полем status, которое должно быть равно
        // конкретному значению ("success"), если лошадь забронирована
      }
    });
}

// проходит 5 минут
// хотим получить актуальный список лошадей, и показать их если появились новые

showActualHorsesList();

function showActualHorsesList() {

  $.ajax({
    url: '/horses/',
    method: 'get'
  })
    .done(data_about_horses => {
      window.horses = data_about_horses // приходит массив такой же структуры, как и раньше, но с другими элементами
      showHorses();
    });
}

// внутри этой функции мы запрашиваем аяксом данные о лошадях.
// и, если надо, после этого выполняем что-то ещё, если оно было передано в something_else
function updateHorsesList(something_else = null) {

}

// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||










