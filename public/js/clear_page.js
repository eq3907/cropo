$(function(){
    var editors = {}
    $('.jq_ckeditor').each(function(i, el) {
        editors[i] = CKEDITOR.replace(el);
        CKFinder.setupCKEditor( editors[i], null, { type: 'Files' } );
    });
});  