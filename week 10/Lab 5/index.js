const express = require('express');
const path = require('path');
const app = express();
const router = require('./router/UserRoutes')
const logger = require('./middleware/logger');

app.use(logger);
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'))
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, 'public')))

app.use(router)

app.listen(7000, () => {
    console.log('Server is running at http://localhost:7000/contact');
})