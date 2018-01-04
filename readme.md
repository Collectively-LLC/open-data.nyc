To run locally:
From the `trellis` directory, run `vagrant up`
From the `site/web/app/themes/open-data-week-theme` directory, run:
`npm install -g npm@latest`
`npm install -g gulp bower`
`npm install && bower install`

Gulp Commands
— Compile and optimize the files in your assets directory
$ gulp

- Compile assets when file changes are made (BrowserSync installed on your browser and head to localhost:3000)
$ gulp watch

- Compile assets for production (no source maps)
$ gulp --production 