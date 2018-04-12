import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import FileRepository from '@ckeditor/ckeditor5-upload/src/filerepository';
import Adapter from '../upload/imageuploadadapter';

export default class HXImageUploadAdapter extends Plugin {
    static get requires() {
        return [FileRepository];
    }

    static get pluginName() {
        return 'HXImageUploadAdapter';
    }

    init() {
        this.editor.plugins.get(FileRepository).createAdapter = loader => new Adapter(loader);
    }
}
