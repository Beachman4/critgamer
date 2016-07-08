var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();

server.listen(3000, function() {
    console.log("listening on 3000");
});

redis.psubscribe('*', function(err, count) {

});

redis.on('pmessage', function(subscribed, channel, essage) {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
})