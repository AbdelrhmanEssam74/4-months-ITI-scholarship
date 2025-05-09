const mysql = require('mysql2')

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'admin',
    password: '9((8ZlVaT176b1zc',
    database: 'express_api',
})

connection.connect((err) => {
    if (err) {
        console.log('Error connecting to the database:', err)
        return
    }
    console.log('Connected to the database')
})

module.exports = connection;