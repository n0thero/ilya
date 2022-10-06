function loveYouAll(param_1) {
  console.log(param_1)
}

function Cat(name) {
  this.name = name;

  this.showName = function () {
    console.log(this.name);
  }
}

let my_kitty = new Cat('kitty');

loveYouAll(my_kitty);
