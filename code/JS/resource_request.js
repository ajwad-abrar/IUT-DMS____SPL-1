var halls = {
    electrical: ['Light', 'Bulb', 'Wifi'],
    stationary: ['Chair', 'Table', 'Curtain'],
    bed: ['Bed', 'Bed Sheet', 'Pillow', 'Pillow Cover']

}




// getting the main and sub menus


var main = document.getElementById('main_menu');
var sub = document.getElementById('sub_menu');




// Trigger the Event when main menu change occurs

main.addEventListener('change', function () {
    selectOptionDynamic(this, 'sub_menu', halls)
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