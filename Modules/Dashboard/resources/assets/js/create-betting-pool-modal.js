import $ from 'jquery';

const name = document.querySelector('#modal-name-input');
const type = document.querySelector('#modal-type-input');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

document.querySelector('#btn-new-betting-pool').addEventListener('click', (e) => {
    e.preventDefault();
    const params = {
        'name': name.value,
        'type': type.value
    };
    console.log(params);
    $.post('/createBettingPool', params)
    .then(response => {
        console.log(response);
    })
})
