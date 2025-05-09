const users = require('../data/users-messages')
const {validationResult} = require('express-validator');
const db = require('../DB/db_connection')

exports.contactUs = (req, res) => {
    res.render('contact', {
        success: '',
        errors: {},
        username: '',
        email: '',
        message: ''
    });
};

exports.validate = (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
        return res.render('contact', {
            errors: errors.array(),
            username: req.body.username,
            email: req.body.email,
            message: req.body.message,
            success: ''
        });
    } else {
        const userMessage = {
            username: req.body.username,
            email: req.body.email,
            message: req.body.message
        }
        // Store the user message in the database
        storeUserMessage(userMessage);
        res.render('contact', {
            success: 'Message sent successfully',
            errors: [],
            username: '',
            email: '',
            message: ''
        });
    }
}

function storeUserMessage(userMessageObj) {
    const sql = 'INSERT INTO `ContactMessages`  (`username`, `email`, `message`) VALUES (?, ?, ?)';
    const values = [userMessageObj.username, userMessageObj.email, userMessageObj.message];

    db.query(sql, values, (err, result) => {
        if (err) {
            return 0;
        }
        return 1;
    });
}