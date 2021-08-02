var halls = {
    north: ['First_N', 'Second_N'],
    south: ['First_S', 'Second_S'],
    female: ['First_F', 'Second_F']

}


const year = {
    'First_N': [101, 102, 103],
    'Second_N': [201, 202, 203],

    'First_S': [101, 102, 103],
    'Second_S': [201, 202, 203],
    
    'First_F': [101, 102, 103],
    'Second_F': [201, 202, 203]
}

var disc = {
    101: ['A', 'B', 'C', 'D'],
    102: ['A', 'B', 'C', 'D'],
    103: ['A', 'B', 'C', 'D'],

    201: ['A', 'B', 'C', 'D'],
    202: ['A', 'B', 'C', 'D'],
    203: ['A', 'B', 'C', 'D'],

    101: ['A', 'B', 'C', 'D'],
    102: ['A', 'B', 'C', 'D'],
    103: ['A', 'B', 'C', 'D'],
    
    201: ['A', 'B', 'C', 'D'],
    202: ['A', 'B', 'C', 'D'],
    203: ['A', 'B', 'C', 'D'],

    101: ['A', 'B', 'C', 'D'],
    102: ['A', 'B', 'C', 'D'],
    103: ['A', 'B', 'C', 'D'],
    
    201: ['A', 'B', 'C', 'D'],
    202: ['A', 'B', 'C', 'D'],
    203: ['A', 'B', 'C', 'D'],
}

// getting the main and sub menus


var main = document.getElementById('main_menu');
var sub = document.getElementById('sub_menu');
var sub2 = document.getElementById('sub_menu2');
var sub3 = document.getElementById('sub_menu3');




// Trigger the Event when main menu change occurs

main.addEventListener('change', function () {
    selectOptionDynamic(this, 'sub_menu', halls)
});


sub.addEventListener('change', function () {
    selectOptionDynamic(this, 'sub_menu2', year)
});

sub2.addEventListener('change', function () {
    selectOptionDynamic(this, 'sub_menu3', disc)
});


function selectOptionDynamic(selectedoption, submenu, submenuValueObject) {

    var sub = document.getElementById(submenu);
    // getting a selected option

    var selected_option = submenuValueObject[selectedoption.value];


    // removing the sub menu options using while loop



    while (sub.options.length > 0) {

        sub.options.remove(0);

    }


    //convert the selected object into array and create a options for each array elements 
    //using Option constructor  it will create html element with the given value and innerText



    Array.from(selected_option).forEach(function (el) {

        let option = new Option(el, el);

        //append the child option in sub menu

        sub.appendChild(option);

    });
};