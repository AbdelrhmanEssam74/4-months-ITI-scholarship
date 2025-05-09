const auth = (req, res, next) => {
    if (req.headers.authorization === 'admin123') {
        next();
    } else {
        res.status(403).send('Access Denied');
    }
};
module.exports = auth;

