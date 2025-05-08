//? Task 1
const express = require('express');
const app = express();
const path = require('path');
const chalk = require('chalk');
const fileHandler = require('fs');

app.use(express.json());

//////////////////////////////////////////////

//? Task 2
app.get('/', (req, res) => {
    res.send('Welcome to Home')
});
app.get('/about', (req, res) => {
    res.send('About Us')
});
app.get('/contact', (req, res) => {
    res.send('Contact Us')
});
app.get('/users/:id', (req, res) => {
    const id = req.params.id;
    res.send(`User ID: ${id}`);
});
app.get('/search', (req, res) => {
    const {q, role} = req.query;
    res.send(`Search results for: ${q}, Role: ${role}`);
});
app.get('/dashboard', (req, res) => {
    res.send('Dashboard');
});

app.get('/api/data', (req, res) => {
    res.json({message: 'API Data'})
});
app.get('/api/users', (req, res) => {
    res.json({message: 'API Users'})
});

///////////////////////////////////////////////////

//? Task 3
const logger = (req, res, next) => {
    const startTime = Date.now();
    res.on('finish', () => {
        const duration = Date.now() - startTime;
        const log = `${req.method} ${req.path} ${res.statusCode} ${duration}ms\n`;
        fileHandler.appendFileSync('server.log', log);
    });
    next();
};

const timer = (req, res, next) => {
    req.start = Date.now();
    res.on('finish', () => {
        const duration = Date.now() - req.start;
        console.log(`Request to ${req.path} took ${duration}ms`);
    });
    next();
};

const auth = (req, res, next) => {
    if (req.query.role !== 'admin') {
        return res.status(403).send('Forbidden');
    }
    next();
};

const validatePost = (req, res, next) => {
    const requiredKeys = ['name', 'email'];
    const missingKeys = requiredKeys.filter(key => !req.body[key]);
    if (missingKeys.length) {
        return res.status(400).send(`Missing fields: ${missingKeys.join(', ')}`);
    }
    next();
};

app.use(logger);
app.use(timer);
// app.use(auth);
// app.use(validatePost);

//////////////////////////////////////////////////

//? Task 4
app.post('/api/data', validatePost, (req, res) => {
    const dataPath = path.join(__dirname, 'data', 'submissions.json');
    const submissions = fileHandler.existsSync(dataPath)
        ? JSON.parse(fileHandler.readFileSync(dataPath, 'utf-8'))
        : [];

    submissions.push(req.body);
    fileHandler.writeFileSync(dataPath, JSON.stringify(submissions, null, 2));
    res.status(201).json({ message: 'submitted successfully' });
});


app.get('/api/users/:id', (req, res) => {
    const users = [
        { id: 1, name: 'Ahmed' },
        { id: 2, name: 'Sara' }
    ];
    const user = users.find(u => u.id === parseInt(req.params.id));
    if (!user) return res.status(404).json({ message: 'User not found' });
    res.json(user);
});

app.get('/api/status', (req, res) => {
    res.status(200).json({ status: 'ok', timestamp: new Date().toISOString() });
});

app.get('/api/error-test', (req, res, next) => {
    next(new AppError('Intentional Error!', 500));
});

/////////////////////////////////////////////////////////////

//? Task 5

app.get('/api/error-test', (req, res, next) => {
    const error = new Error('Error!');
    error.name = 'AppError';
    error.status = 500;
    next(error);
});

app.use((err, req, res, next) => {
    const errorLog = `${new Date().toISOString()} - ${err.name || 'Error'}: ${err.message}\n`;
    const errorLogPath = path.join(__dirname, 'logs', 'error.log');
    fileHandler.appendFileSync(errorLogPath, errorLog);

    res.status(err.status || 500).json({
        error: err.name || 'Error',
        message: err.message || 'Something went wrong',
        status: err.status || 500
    });
});

app.listen(3000, () => {
    console.log(chalk.green(`Server running on http://localhost:3000`));
});

