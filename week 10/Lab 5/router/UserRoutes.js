const express = require('express');
const router = express.Router();

const controller = require('../controllers/userController');
const {validationRules} = require('../middleware/validateContact');


router.get('/contact', controller.contactUs);
router.post('/contact', validationRules, controller.validate);

module.exports = router;