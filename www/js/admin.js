/**
 * Created by Marion on 11/07/2017.
 */

let ajaxUrl = 'admin';

let showPreview = function (option) {
    let md = window.markdownit(),
        content = $('#editor' + option).val(),
        result = md.render(content);

    $('#preview' + option).html(result);
},

createUrl = function () {
    let title = $('#title').val(),
        label = '';

    myAjax(label, ajaxUrl, 'createUrl', [title], function (data) {
        let dataObject = JSON.parse(data);	// transforms json return from php to js object

        if(dataObject.stat === 'ok') {
            $('#url').val(dataObject.msg);
        }
    });
},

binds = function () {
    $('#title').on('blur', createUrl);
};

$(document).ready(function () {
    binds();
});