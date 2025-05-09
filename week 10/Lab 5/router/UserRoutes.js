const express = require('express');
const router = express.Router();
const authMiddleware = require('../middleware/auth');
const controller = require('../controllers/userController');
const {validationRules} = require('../middleware/validateContact');


router.get('/contact', controller.contactUs);
router.post('/contact', validationRules, controller.validate);
router.get('/admin/messages', authMiddleware, controller.getAllMessages);

module.exports = router;