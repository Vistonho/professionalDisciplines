

function Unit($count)
{   
    const $unitArray = [];
    for(let $i = 0; $i < $count; $i++) {

        $unitObj = {
            n: $i,
            hp: Math.floor(Math.random() * 100),
            armor: Math.floor(Math.random() * 100),
            attack: Math.floor(Math.random() * 100),
        };

        $unitArray.push(function () {
            return `Номер юнита: ${$unitObj.n} \n Жизни: ${$unitObj.hp} \n Броня: ${$unitObj.armor} \n Атака: ${$unitObj.attack}`;
        });
    }
    return $unitArray;
}

$res = Unit(5);
console.log($res[3]());
console.log(Unit(10)[9]());
console.log(Unit(5))