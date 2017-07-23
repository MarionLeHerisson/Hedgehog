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
        let title = $('#title').val();

        myAjax(ajaxUrl, 'createUrl', [title], function (data) {
            let dataObject = JSON.parse(data);	// transforms json return from php to js object

            if(dataObject.stat === 'ok') {
                $('#url').val(dataObject.msg);
            }
        });
    },

    saveArticle = function () {
        let data = {
                article_id: $('#article_id').val(),
                title: $('#title').val(),
                url: $('#url').val(),
                intro: $('#editor-intro').val(),
                content: $('#editor-content').val(),
                article_type: $('#type:selected').val(),
                status_id : $('input:radio[name=online]:checked').val(),
                author_id : $('#author_id').val()
            };

        myAjax(ajaxUrl, 'editArticle', data, function (data) {
            let dataObject = JSON.parse(data),	// transforms json return from php to js object
                label = 'createArticle';

            if(dataObject.stat === 'ok') {
                showMessage(label, dataObject, false);
            } else if(dataObject.stat === 'ko') {
                showMessage(label, message, true);
            }
        })
    },

    binds = function () {
        $('#title').on('blur', createUrl);
        $('#createArticle').on('click', saveArticle);
    };

$(document).ready(function () {
    binds();
});