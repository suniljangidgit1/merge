/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	/*config.extraPlugins = 'imageuploader';
    config.extraPlugins = 'html5audio';
    config.extraPlugins = 'youtube';
    config.extraPlugins = 'widget';
    config.extraPlugins = 'lineutils';
    config.extraPlugins = 'video';*/
    config.allowedContent = true;
    config.extraAllowedContent  = true;
    
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup'  ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links']  },
		'/',
		{ name: 'styles', groups: [ 'styles'] },
		{ name: 'colors', groups: [ 'colors'] },
		{ name: 'tools', groups: [ 'tools'] },
		{ name: 'others', groups: [ 'others'] },
		{ name: 'about', groups: [ 'about'] } 
	];
    
    // Simplify the dialog windows.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
    
    
    config.youtube_width = '640';
    config.youtube_height = '480';
    config.youtube_related = true;
    config.youtube_older = false;
    config.youtube_privacy = false;
    
    config.colorButton_foreStyle = {
        element: 'font',
        attributes: { 'color': '#(color)' }
    };

    config.colorButton_backStyle = {
        element: 'span',
        styles: { 'background-color': '#(color)' }
    };
    config.removePlugins = 'save';
    
};
