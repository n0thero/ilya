function first() {
  makeAjaxRequest(window.second);
}

window.second = function (data_from_request) {

};

function makeAjaxRequest(function_to_do_later = null) {

  if (typeof function_to_do_later === 'function') {
    window.function_after_ajax = function_to_do_later;
  } else {
    window.function_after_ajax = null;
  }
}

function pow(c, dfgsfdfsf) {
  return c * dfgsfdfsf;
}

let some_data = {
  one: 1,
  array: [
    {
      two: 2
    }
  ]
}

function one (aaa, bbb = 123) {
  two(bbb + 5, aaa)
}

function two (what, bbb) { // 128, {}
  three(bbb)
  console.log(sum(5, 7) + sum(1,1) - sum(234, 0))
  three(what)
}

function sum(a, b) {
  return b + a + a + a * pow(a, b);
}

function three (ccc) {
  console.log(ccc)
}

one(some_data)
// one(some_data, 555)
