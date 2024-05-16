// Ready
$(document).ready(function () {
    //Image loader var to use when you need a function from object

    var auctionImages = [];

    if (typeof auctionImagesList !== 'undefined') {

        for (var i = 0; i < auctionImagesList.length; i++) {
            var auctionImage = {};
            auctionImage.Url = '/storage/' + auctionImagesList[i];
            auctionImage.Name = '/storage/' + auctionImagesList[i];
            auctionImages.push(auctionImage)
        }
    } else {
        var auctionImages = null;
    }

    // Create image loader plugin
    var imagesloader = $('[data-type=imagesloader]').imagesloader({
        maxfiles: 6,
        minSelect: 1,
        inputID: 'files',
        imagesToLoad: auctionImages

    });

    //Form
    // $frm = $('#frm');

    $frm = $('#myform');

    $frm.submit(function (e) {

        var $form = $(this);

        var files = imagesloader.data('format.imagesloader').AttachmentArray;

        var il = imagesloader.data('format.imagesloader');

        if (il.CheckValidity()) {
            console.log(files)
        }
        $('<input>', {
            type: 'hidden',
            id: 'foo',
            name: gallery_name_key,
            value: JSON.stringify(files)
        }).appendTo('form');

        //   alert('Upload ' + files.length +' files');

    });

    $('#files').on("change", function () {
        console.log('change');
         var $frm = $('#myform');


        var files = imagesloader.data('format.imagesloader').AttachmentArray;

        var il = imagesloader.data('format.imagesloader');

        if (il.CheckValidity()) {
            console.log(files)
        }
        $('<input>', {
            type: 'hidden',
            id: 'foo',
            name: gallery_name_key,
            value: JSON.stringify(files)
        }).appendTo('form');

    });

    window.addEventListener("load", function () {
        var $frm = $('#myform');


        var files = imagesloader.data('format.imagesloader').AttachmentArray;

        var il = imagesloader.data('format.imagesloader');

        if (il.CheckValidity()) {
            console.log(files)
        }
        $('<input>', {
            type: 'hidden',
            id: 'foo',
            name: gallery_name_key,
            value: JSON.stringify(files)
        }).appendTo('form');
    });

});
