const path = require('path');

const HtmlWebpackPlugin = require('html-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {

    devServer: {
        contentBase: path.join(__dirname, './src'),
        watchContentBase: true,
        hot: true,
        compress: true,
        host: '0.0.0.0',
        inline: true,
        port: 3333
    },

    entry: {
        base: ['./src/index.js', './src/scss/base.scss'],
        demo: ['./src/demo.js', './src/scss/demo.scss'],
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'docs'),
    },


    module: {
        rules: [

            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ],
            },

            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader"
                }
            },

            {
                test: /\.html$/,
                use: [
                    {
                        loader: "html-loader"
                    }
                ]
            },

        ]
    },


    plugins: [
        new HtmlWebpackPlugin({
            filename: 'index.html',
            template: 'src/index.html'
        }),
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),

    ]


};
