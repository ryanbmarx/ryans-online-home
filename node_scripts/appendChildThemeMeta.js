const fs = require('fs'),
	filename = process.argv[2],
	childThemeString = `/* Theme Name:   Divi Child theme for Media Salad  
	/* Theme URI:   */  
	/* Description:  Divi 
	/* Child Theme Author: Media Salad */
	/* Author URI: http://www.mediasalad.com    */
	/* Template:     Divi  */
	/* Version:      1.0.0  */
	/* License:      GNU General Public License v2 or later */
	/* License URI:  http://www.gnu.org/licenses/gpl-2.0.html 
	/* Tags:          */
	/* Text Domain:  MSDivi */ \n`;

fs.readFile(`${filename}`, 'utf8', (err, data) => {
	if (err) throw err;
	const outputData = childThemeString + data;

	fs.writeFile(`${filename}`, outputData, (err) => {
		if(err) {
			return console.log(err);
		} else {
			return console.log('done appending child theme metadata');
		}
	}); 
});	