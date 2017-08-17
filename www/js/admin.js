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
            let res = JSON.parse(data);	// transforms json return from php to js object

            if(res.stat === 'ok') {
                $('#url').val(res.msg);
            }
        });
    },

    saveArticle = function () {
        let theme = $('#theme').val(),
            data = {
                article_id: $('#article_id').val(),
                title: $('#title').val(),
                url: $('#url').val(),
                editor_intro: $('#editor-intro').val(),
                editor_content: $('#editor-content').val(),
                article_type: $('#type').val(),
                status : $('#online').val() === 'on' ? 1 : 0,
                theme : theme === undefined ? null : theme,
                author_id : $('#author_id').val(),
                main_media : $('#main_media').val()
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
        // $('#formEditArticle')[0].reset();
    },

    addMainMedia = function (event) {
        let files = event.target.files,
            data = new FormData(),
            label = 'mainImg';

        $.each(files, function(key, value) {
            data.append(key, value);
        });

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR) {
                if(typeof data.error === 'undefined') {
                    if(data.status === 'ko') {
                        showMessage(label, data.msg, true);
                    }
                    else {
                        $('#main_media').val(data.img);
                        showMessage(label, data.msg, false);
                    }
                }
                else {
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('ERRORS: ' + textStatus);
            }
        });
    },

    showTheme = function () {
        let type = $('#type').val(),
            theme = $('#theme_parent');

        if(type === '1') {
            theme.removeClass('none');
        } else {
            theme.addClass('none');
        }
    },

    init = function () {
        showTheme();
    },

    binds = function () {
        let type = $('#type');

        $('#title').on('blur', createUrl);
        $('#createArticle').click(saveArticle);
        $('#resetArticle').click(resetArticle);
        type.on('change', showTheme);
        $('input[type=file]').on('change', addMainMedia);
    };

$(document).ready(function () {
    init();
    binds();
});