const TimepickerUI = exports.TimepickerUI;

const mobile = document.querySelector('.mobile');

const mobileTimepicker = new TimepickerUI(mobile, {
    mobile: true,
    theme: 'crane-radius'
});

mobileTimepicker.create()