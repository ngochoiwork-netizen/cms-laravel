/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    config.height = 500;
    config.allowedContent = true;
    config.removePlugins = 'notification,notificationaggregator';

    config.filebrowserImageBrowseUrl = '/admin/media?select=1&ckeditor=1&type=image';
};