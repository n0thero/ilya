function Brand (title, year) {

  this.construct = function (init_title, init_year) {
    this.title = init_title;
    this.year = init_year;
  }

  this.changeYear = function (new_year) {

    new_year = parseInt(new_year);

    if (new_year >= 0) {
      this.year = new_year;
    }
  }

  this.construct(title, year);
}

function Car(car_data) {
  this.color = car_data.color;
  this.brand = car_data.brand;
  this.id = String(Math.random()).replace('.','');
  this.model = document.createElement("div");
}

let new_car_data = {
  color: 'red',
  brand: 'ferrari'
};

let ferrari = new Car(new_car_data)

let bmw = new Car({
  color: 'blue',
  brand: 'bmw'
});

let major = new Brand('ferrari', 1947);

console.log('Машины этого бренда начали выпускаться с ' + major.year + ' года');

major.changeYear(1990);
