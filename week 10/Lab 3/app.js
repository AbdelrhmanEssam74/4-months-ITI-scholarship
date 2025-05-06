//? Task 1
const handler = require('fs');
const path = require('path');
const folderPath = path.join(__dirname, 'data');
const filePath = path.join(folderPath, 'test.txt');

if (!handler.existsSync(folderPath)) {
    handler.mkdirSync(folderPath);
}
handler.writeFile(filePath, 'welcome from node file', (err) => {
    if (err) {
        console.error('Error:', err);
    } else {
        handler.readFile(filePath, 'utf8', (err, data) => {
            if (err) {
                console.error('Error:', err);
            } else {
                console.log('content:', data);
            }
        });
    }
});

const os = require('os');
console.log('Platform:', os.platform());
console.log('Architecture:', os.arch());
console.log('CPUs:', os.cpus().length);


////////////////////////////////////////////////////


//? Task 2

const Event = require('events');
const eventObj = new Event();
eventObj.on('order', (size, topping) => {
    console.log(`${size} pizza with ${topping}`);
});
eventObj.emit('order', 'Large', 'Mushrooms');

///////////////////////////////////////////////////////////

//? Task 3
const http = require('http');
const server = http.createServer((req, res) => {
    res.setHeader('Content-Type', 'text/html');
    switch (req.url) {
        case '/':
            res.writeHead(200, {"Content-Type": "text/html"});
            res.end("<h1>Welcome to Home Page</h1>");
            break;
        case '/about':
            res.writeHead(200, {"Content-Type": "text/html"});
            res.end("<h1>This is About Page</h1>");
            break;
        case '/api/data':
            res.writeHead(200, {"Content-Type": "application/json"});
            res.end(JSON.stringify({name: 'Ahmed', role: 'Student'}));
            break;
        default:
            res.writeHead(404, {"Content-Type": "text/html"});
            res.end("<h1>404 Page Not Found</h1>");
    }
});
server.listen(3000, () => {
    console.log("Server is running at http://localhost:3000");

})
