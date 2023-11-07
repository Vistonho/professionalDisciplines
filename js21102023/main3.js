const user = {
    'name': 'Vitalik',
    age: 24,
    'address': {
        code: 123321,
        town: 'Murmansk',
        street: 'Kirova',
        home: 3,
        data: {
            'title': 'Жесть, ну и вложенность',
        },
    },
    favoriteFood: ['banana', 'apple', 'peach', 'meat of elephant', 'fish'],
    getFavoriteFood: function () {
        let self = this;
        this.favoriteFood.forEach(function (item) {
            // THIS - пропадает
            // console.log(`${this.name} like ${item}`);
            console.log(`${self.name} like ${item}`);
        })
        //ИЛИ
        this.favoriteFood.forEach((item) => {
            console.log(`${this.name} like ${item}`);
        })
    },
    //создание специального метода Геттер
    get userName() {
        return this.name;
    },
    set userName(value) {
        this.name = value;
    }
}

user.getFavoriteFood();
user.userName = 'Nikolay';
console.log(user.userName);


// console.log(user.address.street);
// console.log(user['address']['street']); //альтернативный синтаксис

// ОБРАБОТКА ОШИБКИ НЕ СУЩЕСТВУЮЩЕГО ЭЛЕМЕНТА
// const $login = user?.account?.login;
// console.log($login);
/*
// Аналог более длинный, но с выводом
if (user !== undefined) {
    if (user.account !== undefined) {
        if (user.account.login !== undefined) {
            console.log(user.account.login);
        } else {
            console.log('user.account.login не существует');
        }
    } else {
        console.log('user.account не существует');
    }
} else {
    console.log('user is not exists');
}
*/