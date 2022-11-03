window.dataBase = {

  state: {
    server_data: server_data
  },

  postUpdateFunction: null,

  sendData: function (your_object) {

    if (!your_object) {
      return;
    }

    $.ajax({
      method: 'post',
      url: '/form_hacker/data_saver.php',
      data: {
        data_to_save: JSON.stringify(your_object)
      }
    })
      .done(function () {
        getDataBase().state.server_data = your_object;
      });
  },

  updateData: function (function_to_do_later = null) {

    if (typeof function_to_do_later === 'function') {
      getDataBase().postUpdateFunction = function_to_do_later;
    } else {
      getDataBase().postUpdateFunction = null
    }

    $.ajax({
      method: 'get',
      url: '/form_hacker/app_data.json'
    })
      .done(function (data) {

        getDataBase().state.server_data = data;

        if (typeof getDataBase().postUpdateFunction === 'function') {
          getDataBase().postUpdateFunction()
        }
      });
  },

}

function getDataBase() {
  return window.dataBase;
}
