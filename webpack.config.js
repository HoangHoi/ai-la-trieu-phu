
/**
 * As our first step, we'll pull in the user's webpack.mix.js
 * file. Based on what the user requests in that file,
 * a generic config object will be constructed for us.
 */

require('laravel-mix');
let ComponentFactory = require('laravel-mix/src/components/ComponentFactory');

new ComponentFactory().installAll();
require(Mix.paths.mix());
/**
 * Just in case the user needs to hook into this point
 * in the build process, we'll make an announcement.
 */

Mix.dispatch('init', Mix);

/**
 * Now that we know which build tasks are required by the
 * user, we can dynamically create a configuration object
 * for Webpack. And that's all there is to it. Simple!
 */

let WebpackConfigBuilder = require('laravel-mix/src/builder/WebpackConfig');
let webpackConfigBuilder = new WebpackConfigBuilder();
let rules = [
    {
        test: /ckeditor5-[^\/]+\/theme\/icons\/[^\/]+\.svg$/,
        use: ['raw-loader']
    },
    {
        test: /^((?!(ckeditor5-[^\/]+\/theme\/icons\/[^\/]+)).)*\.svg$/,
        loader: 'file-loader',
        options: {
            name: path => {
                if (! /node_modules|bower_components/.test(path)) {
                    return Config.fileLoaderDirs.fonts + '/[name].[ext]?[hash]';
                }

                return Config.fileLoaderDirs.fonts + '/vendor/' + path
                    .replace(/\\/g, '/')
                    .replace(
                        /((.*(node_modules|bower_components))|fonts|font|assets)\//g, ''
                    ) + '?[hash]';
            },
            publicPath: Config.resourceRoot
        }
    },
    {
        test: /\.(woff2?|ttf|eot|otf)$/,
        loader: 'file-loader',
        options: {
            name: path => {
                if (! /node_modules|bower_components/.test(path)) {
                    return Config.fileLoaderDirs.fonts + '/[name].[ext]?[hash]';
                }

                return Config.fileLoaderDirs.fonts + '/vendor/' + path
                    .replace(/\\/g, '/')
                    .replace(
                        /((.*(node_modules|bower_components))|fonts|font|assets)\//g, ''
                    ) + '?[hash]';
            },
            publicPath: Config.resourceRoot
        }
    }
];

let webpackConfig = webpackConfigBuilder.build();
webpackConfig.module.rules = webpackConfig.module.rules.filter((item) => {
    return String(item.test) != String(/\.(woff2?|ttf|eot|svg|otf)$/);
});
webpackConfig.module.rules = rules.concat(webpackConfig.module.rules);

module.exports = webpackConfig;
