/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = 'http://localhost/tintuc/public/ckfinder/ckfinder.html';

    config.filebrowserImageBrowseUrl = 'http://localhost/tintuc/public/ckfinder/ckfinder.html?type=Images';

    config.filebrowserFlashBrowseUrl = 'http://localhost/tintuc/public/ckfinder/ckfinder.html?type=Flash';

    config.filebrowserUploadUrl = 'http://localhost/tintuc/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

    config.filebrowserImageUploadUrl = 'http://localhost/tintuc/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

    config.filebrowserFlashUploadUrl = 'http://localhost/tintuc/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
