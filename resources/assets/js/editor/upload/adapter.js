import {getToken} from '../../helper';

export default class Adapter {
    /**
     * Creates a new adapter instance.
     *
     * @param {module:upload/filerepository~FileLoader} loader
     * @param {String} url
     */
    constructor(loader, url, fieldName) {
        /**
         * FileLoader instance to use during the upload.
         *
         * @member {module:upload/filerepository~FileLoader} #loader
         */
        this.loader = loader;

        /**
         * Upload URL.
         *
         * @member {String} #url
         */
        this.url = url;

        /**
         * Upload field name.
         *
         * @member {String} #fieldName
         */
        this.fieldName = fieldName;
    }

    /**
     * Starts the upload process.
     *
     * @see module:upload/filerepository~Adapter#upload
     * @returns {Promise}
     */
    upload() {
        return new Promise((resolve, reject) => {
            this._initRequest();
            this._initListeners(resolve, reject);
            this._sendRequest();
        });
    }

    /**
     * Aborts the upload process.
     *
     * @see module:upload/filerepository~Adapter#abort
     * @returns {Promise}
     */
    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    /**
     * Initializes the XMLHttpRequest object.
     *
     * @private
     */
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        xhr.open( 'POST', this.url, true );
        xhr.responseType = 'json';
    }

    /**
     * Initializes XMLHttpRequest listeners.
     *
     * @private
     * @param {Function} resolve Callback function to be called when the request is successful.
     * @param {Function} reject Callback function to be called when the request cannot be completed.
     */
    _initListeners(resolve, reject) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericError = `Cannot upload file: ${loader.file.name}.`;

        xhr.addEventListener('error', () => reject(genericError));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;
            console.log(xhr.response);

            if (!response || !response.uploaded) {
                return reject(response && response.error && response.error.message ? response.error.message : genericError);
            }

            resolve({
                default: response.url
            });
        });

        // Upload progress when it's supported.
        /* istanbul ignore else */
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    /**
     * Prepares the data and sends the request.
     *
     * @private
     */
    _sendRequest() {
        // Prepare form data.
        const data = new FormData();
        data.append(this.fieldName, this.loader.file);
        data.append('_token', getToken());

        // Send request.
        this.xhr.send(data);
    }
}
