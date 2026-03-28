const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    
    // Точка входа - теперь может быть .tsx
    .addEntry('app', './assets/index.tsx')
    
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    
    // Включаем поддержку React
    .enableReactPreset()
    
    // Включаем TypeScript
    .enableTypeScriptLoader()
    
    // Для CSS Modules
    .configureCssLoader(options => {
        options.modules = {
            auto: /\.module\.\w+$/i,
            localIdentName: '[name]_[local]_[hash:base64:5]',
            exportOnlyLocals: false, 
            namedExport: false  
        };
    })
;

module.exports = Encore.getWebpackConfig();