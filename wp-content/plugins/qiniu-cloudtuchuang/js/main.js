/*global Qiniu */
/*global plupload */
/*global FileProgress */
/*global test hljs */

$(function () {
    console.log("uptokenurl===>", uptokenurl, host);

    var getToken = function (name) {
        var ajax = new XMLHttpRequest();
        ajax.open('GET', uptokenurl + (name || ''), false);
        ajax.setRequestHeader("If-Modified-Since", "0");
        ajax.send();
        if (ajax.status === 200) {
            var res = JSON.parse(ajax.responseText);
            console.log('custom uptoken_func:' + res.uptoken);
            return res.uptoken;
        } else {
            console.log('custom uptoken_func err');
            return '';
        }
    }

    $('#pickfiles').click(function (e) {
        console.log('qiniu_cloudtuchuang_post', e);
        $('#qiniu_uploader').trigger('click');
    });

    $('#qiniu_uploader').on('change', function (e) {
        console.log(e);
        uploadFiles(e);
    })

    getToken('123.jpg');


    var uploadFiles = function (e) {
        let that = this;
        let files = e.target.files;
        if (!files || files.length > 30) {
            console.log("请选择上传的文件，且上传的文件最多不能超过30个");
            return false;
        }
        if (files && files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                uploadFile(files[i]);
            }
        }
        e.target.value = null;
    }

    var uploadFile = function (file) {
        let ticket = getToken(file.name);
        if (ticket) {
            file.ticket = ticket;
        }
        uploadQiNiu(file);
    }

    var uploadQiNiu = function (file) {
        console.log("uploadQiNiu", file);
        let config = {
            useCdnDomain: true,
            disableStatisticsReport: false,
            retryCount: 3,
            region: qiniu.region.z0
        };
        var putExtra = {
            fname: "",
            params: {},
            mimeType: null
        };
        putExtra.params["x:name"] = file.name.split(".")[0];
        let observable = qiniu.upload(file, file.saveKey, file.ticket, putExtra, config);
        var subObject = {
            next: function (res) {
                console.log("next", res);
            },
            error: function (res) {
                console.log("error", res);
            },
            complete: function (res) {
                console.log("complete", res);
                if (res.key) {
                    var qiniuurl = host + '/' + res.key;
                    console.log(host, res.key, qiniuurl);
                    if (true) {
                        var img = '<a href="' + qiniuurl + '"><img src="' + qiniuurl
                            + '" alt="' + title
                            + '" title="' + title
                            + '">';
                    } else {
                        var img = '<img src="' + qiniuurl
                            + '" alt="'
                            + title
                            + '" title="'
                            + title
                            + '">';
                    }
                    console.log(img);
                    var wpActiveEditor, editor,
                        hasTinymce = typeof tinymce !== 'undefined',
                        hasQuicktags = typeof QTags !== 'undefined';

                    if (!wpActiveEditor) {
                        if (hasTinymce && tinymce.activeEditor) {
                            editor = tinymce.activeEditor;
                            wpActiveEditor = editor.id;
                        } else if (!hasQuicktags) {
                            return false;
                        } else {
                            var mdEditor = window.wpEditormd
                            if (mdEditor) {
                                mdEditor.replaceSelection(["![", file.name, "](", qiniuurl, ")", "\n"].join(""));
                            }
                        }
                    } else if (hasTinymce) {
                        editor = tinymce.get(wpActiveEditor);
                    }


                    if (editor && !editor.isHidden()) {
                        editor.execCommand('mceInsertContent', false, img);
                    } else if (hasQuicktags) {
                        QTags.insertContent(img);
                    } else {
                        document.getElementById(wpActiveEditor).value += img;
                    }
                }
            }
        };
        subscription = observable.subscribe(subObject);
    }


    $('#container').on(
        'dragenter',
        function (e) {
            e.preventDefault();
            $('#container').addClass('draging');
            e.stopPropagation();
        }
    ).on('drop', function (e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragleave', function (e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragover', function (e) {
        e.preventDefault();
        $('#container').addClass('draging');
        e.stopPropagation();
    });


    $('#show_code').on('click', function () {
        $('#myModal-code').modal();
        $('pre code').each(function (i, e) {
            hljs.highlightBlock(e);
        });
    });


    $('body').on('click', 'table button.btn', function () {
        $(this).parents('tr').next().toggle();
    });


    var getRotate = function (url) {
        if (!url) {
            return 0;
        }
        var arr = url.split('/');
        for (var i = 0, len = arr.length; i < len; i++) {
            if (arr[i] === 'rotate') {
                return parseInt(arr[i + 1], 10);
            }
        }
        return 0;
    };

    $('#myModal-img .modal-body-footer').find('a').on('click', function () {
        var img = $('#myModal-img').find('.modal-body img');
        var key = img.data('key');
        var oldUrl = img.attr('src');
        var originHeight = parseInt(img.data('h'), 10);
        var fopArr = [];
        var rotate = getRotate(oldUrl);
        if (!$(this).hasClass('no-disable-click')) {
            $(this).addClass('disabled').siblings().removeClass('disabled');
            if ($(this).data('imagemogr') !== 'no-rotate') {
                fopArr.push({
                    'fop': 'imageMogr2',
                    'auto-orient': true,
                    'strip': true,
                    'rotate': rotate,
                    'format': 'png'
                });
            }
        } else {
            $(this).siblings().removeClass('disabled');
            var imageMogr = $(this).data('imagemogr');
            if (imageMogr === 'left') {
                rotate = rotate - 90 < 0 ? rotate + 270 : rotate - 90;
            } else if (imageMogr === 'right') {
                rotate = rotate + 90 > 360 ? rotate - 270 : rotate + 90;
            }
            fopArr.push({
                'fop': 'imageMogr2',
                'auto-orient': true,
                'strip': true,
                'rotate': rotate,
                'format': 'png'
            });
        }

        $('#myModal-img .modal-body-footer').find('a.disabled').each(function () {

            var watermark = $(this).data('watermark');
            var imageView = $(this).data('imageview');
            var imageMogr = $(this).data('imagemogr');

            if (watermark) {
                fopArr.push({
                    fop: 'watermark',
                    mode: 1,
                    image: 'http://www.b1.qiniudn.com/images/logo-2.png',
                    dissolve: 100,
                    gravity: watermark,
                    dx: 100,
                    dy: 100
                });
            }

            if (imageView) {
                var height;
                switch (imageView) {
                    case 'large':
                        height = originHeight;
                        break;
                    case 'middle':
                        height = originHeight * 0.5;
                        break;
                    case 'small':
                        height = originHeight * 0.1;
                        break;
                    default:
                        height = originHeight;
                        break;
                }
                fopArr.push({
                    fop: 'imageView2',
                    mode: 3,
                    h: parseInt(height, 10),
                    q: 100,
                    format: 'png'
                });
            }

            if (imageMogr === 'no-rotate') {
                fopArr.push({
                    'fop': 'imageMogr2',
                    'auto-orient': true,
                    'strip': true,
                    'rotate': 0,
                    'format': 'png'
                });
            }
        });

        var newUrl = Qiniu.pipeline(fopArr, key);

        var newImg = new Image();
        img.attr('src', 'images/loading.gif');
        newImg.onload = function () {
            img.attr('src', newUrl);
            img.parent('a').attr('href', newUrl);
        };
        newImg.src = newUrl;
        return false;
    });

});

