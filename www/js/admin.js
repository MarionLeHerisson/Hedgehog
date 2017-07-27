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
                editor_intro: $('#editor-intro').val(),
                editor_content: $('#editor-content').val(),
                article_type: $('#type').val(),
                status : $('#online').val() === 'on' ? 1 : 0,
                author_id : $('#author_id').val()
            };

        myAjax(ajaxUrl, 'editArticle', data, function (data) {
            let dataObject = JSON.parse(data),	// transforms json return from php to js object
                label = 'createArt';

            if(dataObject.stat === 'ok') {
                showMessage(label, dataObject.msg, false);
            } else if(dataObject.stat === 'ko') {
                showMessage(label, dataObject.msg, true);
            }
        })
    },

    resetArticle = function () {
        $('#formEditArticle')[0].reset();
    },

    binds = function () {
        $('#title').on('blur', createUrl);
        $('#createArticle').click(saveArticle);
        $('#resetArticle').click(resetArticle);
    };

$(document).ready(function () {
    binds();
});