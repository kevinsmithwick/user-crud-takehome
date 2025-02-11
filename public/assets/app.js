$(document).ready(function () {
    hideSpinner();
//    loadRegistered();
    loadOnDeck();
    setTimeout("intake()", seconds(5));
});

var hideCount = 0;

function showSpinner() {
    hideCount++;
    $('#dogSpinner').show();
}

function hideSpinner() {
    hideCount--
    if (hideCount <= 0) {
        hideCount = 0;
        $('#dogSpinner').hide();
    }
}

function loadRegistered() {
    showSpinner();

    const url = '/registered/'
    $.ajax({
        type: 'GET',
        url: url,

        success: function (data) {
            $('#dogsWaiting').text("dog is loaded")
            hideSpinner()
        }

    });
}

function loadOnDeck() {
    showSpinner()
    const url = '/on-deck/'
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            hideSpinner();
            $('#dogsWaiting').html(data);
        }
    });
}

function intake() {
    showSpinner();

    const url = '/intake'
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            hideSpinner()
            if (data.dogs > 0) {
                $('#footerText').html(data.dogs + " just taken in");
                loadOnDeck();
            }
            setTimeout("intake()", seconds(10));

        }

    });
}

function seconds(sec) {
    return sec * 1000;
}

function confirmText(name) {
    const messages = [
        `Has ${name}'s time has come`,
        `Another mouth to feed? \nIs ${name} a useless eater?`,
        `Gotta go, bye by ${name}`,
        `The Grim Reaper has come for ${name}`,
        `Is it a hard knock life for ${name}?`,
        `${name} just didn't have what it takes?`,
        `Is ${name} just another statistic?`
    ];
    return messages[Math.floor(Math.random() * messages.length)];

}

function euthanize(id, name) {
    if (confirm(confirmText(name))) {
        const url = '/euthanize/' + id;
        showSpinner()
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                hideSpinner();
                loadOnDeck();
            }
        });
    }
}


/*************************************************************************/
/*************************************************************************/
/*************************************************************************/
var modalWindowCommand = '';

function modelWindowShow(command, args) {
    var url = '';
    switch (command) {
        case 'on-board':
            url = '/on-board/' + args;
            $('#modelWindowLabel').html("Onboard a new dog");
            break;
        default:
            alert('unknown command');
            return;
    }
    showSpinner()
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            hideSpinner();
            $('#modelWindowBody').html(data);
            $('#modelWindow').modal({});

        }
    });
}

function modelWindowSave() {

}

/*************************************************************************/
/*************************************************************************/
/*************************************************************************/
