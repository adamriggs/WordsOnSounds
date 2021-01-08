// eslint-disable-next-line no-undef
module.exports = {
    entry: {
        main: ['./src/js/index.js', './src/scss/style.scss']
        // home: ['./src/js/home.js'],
        // hero: ['./src/js/hero.js'],
        // blocks: [],
        // editor: []
    },
    devtool: 'cheap-module-eval-source-map',
    outputFolder: 'dist',
    proxyTarget: 'http://wos.lcl/'
};
