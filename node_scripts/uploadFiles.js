var fs = require('fs');
var Client = require('ssh2-sftp-client');
var sftp = new Client();

var filesToUpload = [];

process.argv.forEach((v, i) => {
	// Cycle through the arguments passed arguments and add them to the list
	// TO DO, add check for desired file types?
	// TO DO, look for dirs
	if (i > 1){
		filesToUpload.push(v);
	}
});
					
var remoteDir = `/home/drthurstone/public_html/wp-content/themes/MSDivi`,
	localDir = `~/Google Drive/Media Salad/dr_thurstone/web_publish`,
	serverHost = 'new.drthurstone.com',
	user = 'drthurstone',
	pass = '72JPSFk6CfaSTXNG';

var config = {
	// protocol: 'sftp',
    host: serverHost,
    port: 8080,
    username: user,
    password: pass
};


sftp.connect(config).then(() => {
    return sftp.list(remoteDir);
}).then((data) => {
    // console.log(data, 'the data info');
}).then((data) => {
	filesToUpload.forEach(file => {
		console.log('>> uploading: ' + file)
		sftp.put(file, `${remoteDir}/${file}`);
	})
}).catch((err) => {
    console.log(err, 'catch error');
});;


