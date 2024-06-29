const webpack = require('webpack')
const path = require('path')
const CleanWebpackPlugin = require('clean-webpack-plugin')

module.exports = {
    mode: 'production',

    entry: {
        'index': [
            './src/index'
        ]
    },

    output: {
        path: path.resolve(__dirname, './dist'),
        filename: '[name].js',
        publicPath: 'http://localhost:3000/assets/'
    },

    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                include: path.appSrc,
                loader: require.resolve('babel-loader'),
                options: {
                    // This is a feature of `babel-loader` for webpack (not Babel itself).
                    // It enables caching results in ./node_modules/.cache/babel-loader/
                    // directory for faster rebuilds.
                    //cacheDirectory: true,
                    //plugins: ['react-hot-loader/babel'],
                },
            }
        ]
    },

    plugins: [
        new webpack.NamedModulesPlugin(),
        new CleanWebpackPlugin(['dist']),
    ],

    devServer: {
        host: 'localhost',
        port: 3000,
        historyApiFallback: true,
        hot: true,
        inline: true,
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    },

}
