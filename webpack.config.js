const path = require('path');
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
    entry: './assets/js/main.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'assets/js'),
        publicPath: 'assets'
    },
    module: {
        rules: [{
            test: /\.(sa|sc|c)ss$/,
            use: [
                MiniCssExtractPlugin.loader,
                // "style-loader",
                "css-loader",
                "sass-loader"]
        },
            {
                test:/\.js$/,
                exclude: /node_modules/,
                use:[{
                    loader:'babel-loader',
                }]
            }

        ]
    },
    mode: 'development',
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),
        new MiniCssExtractPlugin({
            filename: "../css/[name].css",
            chunkFilename: "../css/[id].css",
        })
    ],
    watch: true,
    devtool: 'inline-cheap-source-map'
};