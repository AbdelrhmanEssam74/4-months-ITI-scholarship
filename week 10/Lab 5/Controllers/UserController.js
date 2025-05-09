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
        if (storeUserMessage(userMessage)) {
            return res.render('thankyou', {
                success: 'Your message has been sent successfully.',
                username: req.body.username,
                email: req.body.email,
                message: req.body.message
            });
        }
    }
}

async function storeUserMessage(userMessageObj) {
    const sql = 'INSERT INTO `ContactMessages` (`username`, `email`, `message`) VALUES (?, ?, ?)';
    const values = [userMessageObj.username, userMessageObj.email, userMessageObj.message];

    try {
        await db.promise().query(sql, values);
        return 1;
    } catch (err) {
        console.error('Database error:', err);
        return 0;
    }
}


exports.getAllMessages = async (req, res) => {
    try {
        const [rows] = await db.promise().query('SELECT * FROM `ContactMessages` ORDER BY `createdAt` DESC');
        res.render('messages', { messages: rows });
    } catch (err) {
        console.error('Error fetching messages:', err);
        res.status(500).send('Failed to fetch messages');
    }
};