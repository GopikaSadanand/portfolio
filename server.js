/**
 * Local HTTP Server for Gopika Sadanand Portfolio
 * Zero external dependencies - uses Node.js standard libraries.
 */

const http = require('http');
const fs = require('fs');
const path = require('path');
const { exec } = require('child_process');

let PORT = parseInt(process.env.PORT, 10) || 3000;
const ROOT = path.resolve(__dirname);

const MIME_TYPES = {
  '.html': 'text/html; charset=UTF-8',
  '.css': 'text/css; charset=UTF-8',
  '.js': 'application/javascript; charset=UTF-8',
  '.json': 'application/json',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.gif': 'image/gif',
  '.svg': 'image/svg+xml',
  '.ico': 'image/x-icon',
  '.pdf': 'application/pdf',
  '.txt': 'text/plain; charset=UTF-8'
};

const server = http.createServer((req, res) => {
  // Normalize URL to remove query string and decode URI
  const parsedUrl = new URL(req.url, `http://${req.headers.host || 'localhost'}`);
  let pathname = decodeURIComponent(parsedUrl.pathname);

  if (pathname === '/') {
    pathname = '/index.html';
  }

  // Prevent directory traversal attacks
  const safePath = path.normalize(path.join(ROOT, pathname));
  if (!safePath.startsWith(ROOT)) {
    res.writeHead(403, { 'Content-Type': 'text/plain' });
    res.end('403 Forbidden');
    return;
  }

  fs.stat(safePath, (err, stats) => {
    if (err) {
      if (err.code === 'ENOENT') {
        const indexPath = path.join(ROOT, 'index.html');
        fs.readFile(indexPath, (indexErr, indexData) => {
          if (indexErr) {
            res.writeHead(404, { 'Content-Type': 'text/plain' });
            res.end('404 Not Found');
          } else {
            res.writeHead(200, { 'Content-Type': 'text/html; charset=UTF-8' });
            res.end(indexData);
          }
        });
        return;
      }
      res.writeHead(500, { 'Content-Type': 'text/plain' });
      res.end(`Server Error: ${err.code}`);
      return;
    }

    if (stats.isDirectory()) {
      res.writeHead(302, { Location: pathname.endsWith('/') ? `${pathname}index.html` : `${pathname}/index.html` });
      res.end();
      return;
    }

    const ext = path.extname(safePath).toLowerCase();
    const contentType = MIME_TYPES[ext] || 'application/octet-stream';

    fs.readFile(safePath, (readErr, data) => {
      if (readErr) {
        res.writeHead(500, { 'Content-Type': 'text/plain' });
        res.end(`Failed to read file: ${readErr.code}`);
        return;
      }
      res.writeHead(200, {
        'Content-Type': contentType,
        'Cache-Control': 'no-cache'
      });
      res.end(data);
    });
  });
});

function listen(port) {
  server.listen(port, () => {
    const actualPort = server.address().port;
    const url = `http://localhost:${actualPort}`;
    console.log('\n======================================================');
    console.log('  🚀 Gopika Sadanand - Portfolio Website Live Server');
    console.log('======================================================');
    console.log(`\n  Website running at: ${url}`);
    console.log('  Press Ctrl + C in this window to stop the server.\n');

    if (process.platform === 'win32' && !process.env.CI) {
      exec(`start ${url}`, () => {});
    }
  });
}

server.on('error', (e) => {
  if (e.code === 'EADDRINUSE') {
    PORT += 1;
    console.log(`⚠️ Port ${PORT - 1} is busy. Trying port ${PORT}...`);
    listen(PORT);
  } else {
    console.error('Server error:', e);
  }
});

listen(PORT);
