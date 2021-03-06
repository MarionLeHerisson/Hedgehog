/**
 * Created by Marion on 11/07/2017.
 */

let ajaxUrl = 'admin';

let createUrl = function () {
        let title = $('#title').val();

        myAjax(ajaxUrl, 'createUrl', [title], function (data) {
            let res = JSON.parse(data);

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
                status : $('.toggle').hasClass('off') ? 0 : 1,
                theme : theme === undefined ? null : theme,
                author_id : $('#author_id').val()
                // main_media : $('#main_media').val()
            };

        myAjax(ajaxUrl, 'editArticle', data, function (data) {
            let dataObject = JSON.parse(data),
                label = 'createArt';

            if(dataObject.stat === 'ok') {
                showMessage(label, dataObject.msg, false);
            } else if(dataObject.stat === 'ko') {
                showMessage(label, dataObject.msg, true);
            }
        })
    },

    clearForm = function () {
        $('#formEditArticle')[0].reset();
    },

    addMainMedia = function (event) {
        let files = event.target.files,
            data  = new FormData(),
            label = 'mainImg',
            angle = false;

        if($('#media_rotate').is(':checked')) {
            angle = $('#rotate_angle').val();
        }

        showMessage(label, '<img src="Medias/loader.gif">', false);

        $.each(files, function(key, value) {
            data.append(key, value);
        });

        data.append('angle', angle);

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data) {   // function(data, textStatus, jqXHR)
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
            error: function(jqXHR, textStatus) {    // function(jqXHR, textStatus, errorThrown)
                console.log('ERRORS: ' + textStatus);
            }
        });
    },

    // Show theme field if "article" type is selected
    showTheme = function () {
        let type = $('#type').val(),
            theme = $('#theme_parent');

        if(type === '1') {
            theme.removeClass('none');
        } else {
            theme.addClass('none');
        }
    },

    displayAllArticles = function () {
        let type = $('#list-type').val();
        $('#articles_list').remove();

        myAjax(ajaxUrl, 'displayAllArticles', type, function (data) {
            let res = JSON.parse(data),
                div = $('<div id="articles_list">'),
                html = '<ul>',
                select = $('#list-type');

            $.each(res.articles, function (key, value) {
                html += '<li><span class="online-' + value.status_id +
                        '">o </span><a href="' + value.url + '" target="_blank">'
                        + value.title + '</a></li>'
            });

            html += '</ul>';
            div.html(html);
            select.after(div)
        })
    },

    findArticle = function () {
  //      window.setTimeout(function () {
        let keyword = $('#title').val(),
            div = $('#articles_dropdown');

        if(keyword != '') {

            myAjax(ajaxUrl, 'findArticle', keyword, function (data) {
                let res = JSON.parse(data),
                    html = '<ul>',
                    input = $('#title');

                $.each(res.articles, function (key, value) {
                    html += '<li class="dropArticle" data-id="' + value.id + '">' + value.title + '</li>'
                });

                html += '</ul>';
                div.html(html);
                $('.dropArticle').unbind();
                $('.dropArticle').click(fillForm);
            });
         // }, 600);

        } else {
            div.html('');
        }
    },

    fillForm = function () {
        let id = $(this).data('id');

        myAjax(ajaxUrl, 'getArticle', id, function (data) {
            let res = JSON.parse(data),
                online = $('#online'),
                theme = $('#theme');

            $('#article_id').val(res.id);
            $('#title').val(res.title);
            $('#url').val(res.url);
            $('#editor-intro').val(res.intro);
            $('#editor-content').val(res.content);
            $('#type').val(res.article_type_id);
            res.status_id === 1 ? online.val('on') : online.val('off');
            $('#author_id').val(res.author_id);
            res.is_main !== null ? $('#main_media').val(res.main_media_id) : $('#main_media').val('');

            showTheme();
            res.theme_id !== null ? theme.val(res.theme_id) : theme.val(undefined);
        });

        $('#articles_dropdown').html('');
    },

    showDropdown = function () {
        if($('#media_rotate').is(':checked')) {
            $('#rotate_angle').parent().removeClass('none');
        } else {
            $('#rotate_angle').parent('div').addClass('none');
        }
    },

    init = function () {
        showTheme();
    },

    binds = function () {
        // Article edition
        $('#title').on('blur', createUrl);
        $('#title').on('keyup', findArticle);
        $('#createArticle').click(saveArticle);
        $('#resetArticle').click(clearForm);
        $('#type').on('change', showTheme);
        $('input[type=file]').on('change', addMainMedia);

        // Add media
        $('#media_rotate').on('change', showDropdown);

        // Manage articles
        $('#list-type').on('change', displayAllArticles);

        // Manage comments
    };

$(document).ready(function () {
    init();
    binds();
});
