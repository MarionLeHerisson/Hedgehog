/**
 * @param label		// String - Where error message will appear
 * @param url		// String - The Controller to be called
 * @param action	// String - The method to be called
 * @param param		// Array  - parameters
 * @param callback	// Callable - Called if success
 */
function myAjax(label, url, action, param, callback) {

    $.ajax({
        type: "POST",
        url: url,
        data: {
            action: action,
            param: param
        },
        success: callback,
        error: function () {
            showMessage(label, 'Une erreur de connexion s\'est produite. Veuillez recharger la page et réessayer.' +
                'Si l\'erreur persiste, veuillez contacter l\'équipe technique de ColiGo.', true);
        }
    });
}

function closePopin() {
    $('.alert-dismissible').each(function() {
        $(this).addClass('none');
    });
}

/**
 *
 * @param label     // String - id of the div
 * @param message   // String - the message to be displayed
 * @param isError   // Bool - set to true for an error
 */
function showMessage(label, message, isError) {

    var typeAdded ='success',
        typeRemoved = 'danger';
    if(isError === true) {
        typeAdded = 'danger';
        typeRemoved = 'success';
    }

    $('#' + label + 'Msg').html(message);
    $('#' + label).removeClass('alert-' + typeRemoved).addClass('alert-' + typeAdded).removeClass('none');
}

function showTooltip(label) {
    $('#' + label).tooltip('show');
}

function scrollToTop() {

    var body = $("html, body");
    body.animate({
            scrollTop:0
        },
        'slow'
    );
}

function scrollToBottom() {

    var body = $("html, body");
    body.animate({
            scrollTop:2000
        },
        'slow'
    );
}