/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';

    config.language = 'en';

    // Uncomment the following line if your users tend to frequently paste in contents from, say, MS-Word.
    // config.forcePasteAsPlainText = true;

    // Uncomment the following block to make CKEditor format self-closing tags the old way e.g. as <br> and <img> instead of <br/> and <img/>
    /*
    CKEDITOR.on( 'instanceReady', function( ev )
    {
        // Ends self closing tags the HTML4 way, like <br/>.
        ev.editor.dataProcessor.writer.selfClosingEnd = '>';
    });
    */
    // Aashish try
    //CKEDITOR.config.autoParagraph = false;config.autoParagraph = false;
    // config.enterMode = CKEDITOR.ENTER_BR;
    // config.shiftEnterMode = CKEDITOR.ENTER_BR;
    // config.autoParagraph = true;
    config.entities = false;
    config.enterMode = 2;
    config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER Key puts the <br/> tag
    config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER Keys puts the <p> tag

};
