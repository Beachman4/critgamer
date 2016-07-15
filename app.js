var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();

server.listen(3000, function() {
    console.log("listening on 3000");
});

redis.subscribe('main', function(channel, message) {

});

redis.on('message', function(channel, message) {
    console.log(channel);
    console.log(message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});