var fs = require('fs');
// var Client = require('ssh2-sftp-client');
var Client = require('ssh2').Client;
var conn = new Client();

/*

REMOTE = /srv/users/serverpilot/apps/gavia/public/wp-content/themes/divi-child/screenshot.png

LOCAL = ~/Google Drive/Red27/2016/gavia/web_publish/screenshot.png

107.170.242.224
serverpilot
hmqRqSF%#rj3F9y


sftp serverpilot@107.170.242.224:hmqRqSF%#rj3F9y

*/

var filesToUpload = [];

process.argv.forEach((v, i) => {
	// Cycle through the arguments passed arguments and add them to the list
	// TO DO, add check for desired file types?
	// TO DO, look for dirs
	if (i > 1){
		filesToUpload.push(v);
	}
});

var remoteDir = `/srv/users/serverpilot/apps/media-salad/public/wp-content/themes/divi-child`,
	localDir = `~/Google Drive/Media Salad/Gilmore/matrix/web_publish`,
	serverHost = '107.170.242.224',
	user = 'serverpilot',
	pass = 'hmqRqSF%#rj3F9y';

var config = {
	protocol: 'sftp',
    host: serverHost,
    port: 22,
    username: user,
    password: pass
};

conn.on('ready', function() {
  console.log('Client :: ready');
  // conn.exec('uptime', function(err, stream) {
  //   if (err) throw err;
  //   stream.on('close', function(code, signal) {
  //     console.log('Stream :: close :: code: ' + code + ', signal: ' + signal);
  //     conn.end();
  //   }).on('data', function(data) {
  //     console.log('STDOUT: ' + data);
  //   }).stderr.on('data', function(data) {
  //     console.log('STDERR: ' + data);
  //   });
  // });
}).connect(config);


// sftp.connect(config).then(() => {
//     return sftp.list(remoteDir);
// }).then((data) => {
//     console.log(data, 'the data info');
// }).then((data) => {
// 	filesToUpload.forEach(file => {
// 		console.log('>> uploading: ' + file)
// 		sftp.put(file, `${remoteDir}/${file}`);
// 	})
// }).catch((err) => {
//     console.log(err, 'catch error');
// });;


