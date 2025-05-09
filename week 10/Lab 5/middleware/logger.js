const winston = require('winston');
const path = require('path');

const logger = winston.createLogger({
    level: 'info',
    format: winston.format.combine(
        winston.format.timestamp({ format: 'YYYY-MM-DD HH:mm:ss' }),
        winston.format.printf(({ timestamp, level, message }) => {
            return `[${timestamp}] ${level.toUpperCase()}: ${message}`;
        })
    ),
    defaultMeta: { service: 'user-service' },
    transports: [
        new winston.transports.File({ filename: path.join(__dirname, '../logs/access.log') })
    ],
});

if (process.env.NODE_ENV !== 'production') {
    logger.add(new winston.transports.Console({
        format: winston.format.simple(),
    }));
}


const logMiddleware = (req, res, next) => {
    res.on('finish', () => {
        const logMessage = `${req.method} ${req.originalUrl} - ${res.statusCode} ${res.statusMessage}`;
        logger.info(logMessage);

        if (res.statusCode >= 400) {
            logger.error(`Error: ${logMessage}`);
        }
    });
    next();
};

module.exports = logMiddleware;
