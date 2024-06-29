import path from "path";
import { fileURLToPath } from "url";
import webpack from "webpack";
import MiniCssExtractPlugin from "mini-css-extract-plugin";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const webpackConfig = {
  mode: "production",
  entry: {
    bundle: ["./src/js/bundle.js"],
    vendors: "./src/js/vendors.js",
    reactApp: "./src/js/reactApp.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "dist/js"),
  },
  optimization: {
    splitChunks: {
      chunks: "all",
      name: "common",
    },
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env", "@babel/preset-react"],
          },
        },
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
      {
        test: /\.pug$/,
        use: ["pug-loader"],
      },
      {
        test: /\.(webp)$/,
        type: 'asset/resource',
        generator: {
          filename: 'images/[name].[contenthash][ext]'
        }
      },
    ],
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
    }),
    new MiniCssExtractPlugin({
      filename: '../css/[name].css', // Путь к CSS файлам
    }),
  ],
  resolve: {
    extensions: [".js", ".jsx"],
    alias: {
      jquery: path.resolve(__dirname, "node_modules/jquery/dist/jquery.js"),
    },
  },
  devtool: "source-map",
};

export default webpackConfig;
