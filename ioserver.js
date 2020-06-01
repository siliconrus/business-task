const http = require('http').Server();
const io = require('socket.io')(http);
const Redis = require('ioredis');

const redis = new Redis();
redis.subscribe('new-action');
redis.on('message', function (channel, message) {
    console.log('Message recieved:' + message);
    console.log('Channel' + channel);

    message.JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(2096, function () {
    console.log('Listening on Port: 3000');
})