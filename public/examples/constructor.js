// примеры привычной записи объектов

let bike_1 = {
  id: 65,
  owner: 'John'
};

let bike_2 = {
  id: 562,
  owner: 'Ilya'
}

// а это их конструктор, с помощью которого их будет проще создавать
function Bike(params) { // в params ждём объект. Хотя могли переделать на работу с несколькими переменными

  this.id = params.id;
  this.owner = params.owner;

  this.showOwner = function (he_is_cool) {
    alert('Владелец этого байка: ' + this.owner);

    if (he_is_cool) {
      alert('И он крутой!')
    }
  }
}

let bike_3 = new Bike({
  id: 23553,
  owner: 'V'
});

let bike_4 = new Bike({
  id: 90532,
  owner: 'David'
});

let bikes_data = [
  {
    id: 14214,
    name: 'A'
  },
  {
    id: 253,
    name: 'B'
  }
];

let cool_bikes_owners_names = [
  'David'
];

let bikes = [
  bike_3,
  bike_4
];

bikes.map(bike => {
  // if (bike.owner) - если владелец в списке крутых владельцев cool_bikes_owners_names, то
  // bike.showOwner() - покажем инфу о нём
});

bike_3.showOwner();
