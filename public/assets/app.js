$(document).ready(function () {
    hideSpinner();
    loadRegistered();
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
            $('#dogsRegistered').html(data);
            hideSpinner();
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

function adopt(id, name){
    alert("Gotta Love Me: " + name);
    const url = '/adopt/' + id;
    showSpinner()
    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            hideSpinner();
            loadRegistered();
        }
    });
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
                loadRegistered();
            }
        });
    }
}


/*************************************************************************/
/*************************************************************************/
/*************************************************************************/
var modalWindowCommand = '';

function modelWindowShow(command, args) {
    modalWindowCommand = command;
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

function objectifyForm(formId) {
    var serializedData = $('#' + formId).serialize();
    let urlParams = new URLSearchParams(serializedData); // get interface / iterator
    let unserializedData = {}; // prepare result object
    for (let [key, value] of urlParams) { // get pair > extract it to key/value
        unserializedData[key] = value;
    }

    return unserializedData;
}

function validateOnBoard(form) {
    errors = [];
    if (form.breed.trim() === '') {
        errors.push("Breed is required");
    }
    if (form.sex.trim() === '') {
        errors.push("Sex is required");
    }
    if (form.size.trim() === '') {
        errors.push("Size is required");
    }
    if (form.temperament.trim() === '') {
        errors.push("Temperament is required");
    }
    if (form.cuteness.trim() === '') {
        errors.push("Cuteness is required");
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}

function onBoardSubmit() {

    var form = objectifyForm('onboardForm')
    if (validateOnBoard(form)) {
        showSpinner();
        var url = '/register/' + form.id
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function (data) {
                hideSpinner()
                $('#modelWindow').modal('hide');
                alert("Dog onboarded");
                loadRegistered();
                loadOnDeck();
            }
        });
    }
}

function modelWindowSave() {
    switch (modalWindowCommand) {
        case 'on-board':
            onBoardSubmit();
            break;
        default:
            alert("I don't know what to do");
    }
}

/*************************************************************************/
/*************************************************************************/
/*************************************************************************/
