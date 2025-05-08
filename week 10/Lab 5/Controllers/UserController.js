const users = require('../data/users-messages')
const {validationResult} = require('express-validator');


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
            errors : errors.array(),
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
        users.push(userMessage);
        res.render('contact', {
            success: 'Message sent successfully',
            errors: [],
            username: '',
            email: '',
            message: ''
        });
    }
}

