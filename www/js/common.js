/**
 * @param url		// String - The Controller to be called
 * @param action	// String - The method to be called
 * @param param		// Array  - parameters
 * @param callback	// Callable - Called if success
 */
function myAjax(url, action, param, callback) {

    $.ajax({
        type: "POST",
        url: url,
        data: {
            action: action,
            param: param
        },
        success: callback
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

    let typeAdded ='success',
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


/**
 * Scroll buttons
 */
function scrollToTop() {

    let body = $("html, body");
    body.animate({
            scrollTop:0
        },
        'slow'
    );
}

function scrollToBottom() {

    let body = $("html, body");
    body.animate({
            scrollTop:2000
        },
        'slow'
    );
}

function showPreview(option) {
    let md = window.markdownit(),
        content = $('#editor' + option).val(),
        result = md.render(content);

    $('#preview' + option).html(result);
}

function countDays() {
    let today = new Date(),
        dep = new Date(2017, 08, 18);

    count = (today.getTime() - dep.getTime()) / (3600000 * 24);
    $('#daysCount').html(Math.floor(count));
}

function addComment() {
    alert('Michel est pas qu\'un peu relou');
}

$(document).ready(function () {
    countDays();
});
