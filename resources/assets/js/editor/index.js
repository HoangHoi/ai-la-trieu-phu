import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import UnderLinePlugin from '@ckeditor/ckeditor5-basic-styles/src/underline';
import BlockquotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import ImagePlugin from '@ckeditor/ckeditor5-image/src/image';
import ImagecaptionPlugin from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImagestylePlugin from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImagetoolbarPlugin from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import ImageuploadPlugin from '@ckeditor/ckeditor5-image/src/imageupload';
import ImageUploadAdapter from './upload/imageuploadadapter';
import BalloonToolbar from '@ckeditor/ckeditor5-ui/src/toolbar/balloon/balloontoolbar';

let configEditor = (ckeditor) => {
    ckeditor.plugins.get('FileRepository').createAdapter = function(loader) {
        console.log('FileRepository_createAdapter');
        return new ImageUploadAdapter(loader);
    };
    console.log(ckeditor.getData());
};

let editor = (selector) => {
    let element = document.querySelector(selector);
    if (!element) {
        console.log('Can\'t find selector');
        return;
    }
    ClassicEditor
        .create(element, {
            plugins: [
                EssentialsPlugin,
                BoldPlugin,
                ItalicPlugin,
                UnderLinePlugin,
                BlockquotePlugin,
                HeadingPlugin,
                ImagePlugin,
                ImagecaptionPlugin,
                ImagestylePlugin,
                ImagetoolbarPlugin,
                LinkPlugin,
                ListPlugin,
                ParagraphPlugin,
                ImageuploadPlugin
            ],
            alignment: {
                options: [ 'left', 'right' ]
            },
            contextualToolbar: [ 'bold', 'italic', 'undo', 'redo' ],
            toolbar: {
                items: [
                    'heading',
                    // '|',
                    'bold',
                    'italic',
                    'underline',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'undo',
                    'redo',
                    'image'
                ],
                viewportTopOffset: 50
            },
            image: {
                toolbar: [
                    'imageStyle:alignLeft',
                    'imageStyle:alignCenter',
                    'imageStyle:alignRight',
                    'imageStyle:full',
                    '|',
                    'imageTextAlternative'
                ],
                styles: [
                    'full',
                    'alignLeft',
                    'alignRight',
                    'alignCenter'
                ]
            },
            language: 'en'
        })
        .then(ckeditor => {
            console.log('Editor was initialized', ckeditor);
            configEditor(ckeditor);
        })
        .catch(error => {
            console.error(error.stack);
        });
}
window.editor = editor;
export default editor;
