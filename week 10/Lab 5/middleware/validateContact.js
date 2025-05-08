const { body } = require('express-validator');

exports.validationRules = [
    body('username')
        .notEmpty().withMessage("Name is required"),

    body('email')
        .notEmpty().withMessage("Email is required")
        .isEmail().withMessage("Email is not valid"),

    body('message')
        .notEmpty().withMessage("Message is required")
        .isLength({ min: 10 }).withMessage("Message should be at least 10 characters"),
];
