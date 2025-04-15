import $ from 'jquery';

const code = document.querySelector('#modal-code-input');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

document.querySelector('#btn-join-betting-pool').addEventListener('click', (e) => {
    e.preventDefault();

    $.post(
        '/joinBettingPool',
        {
            'code': code.value
        }
    ).then(
        () => {window.location.reload();}
    ).fail(
        () => {window.location.reload();}
    )
})
