/**
 * Created by Marion on 11/07/2017.
 */

var showPreview = function (option) {
    var md = window.markdownit(),
        content = $('#editor' + option).val(),
        result = md.render(content);

    $('#preview' + option).html(result);
};