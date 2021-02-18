function isValidDate(s) {
	var bits = s.split('/');
	var d = new Date(bits[2] + '/' + bits[1] + '/' + bits[0]);
	return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]));
}

function compareToday(s) {
	var d = new Date()
	var month = d.getMonth()+1
	var day = d.getDate();
	var today = ((''+day).length<2 ? '0' : '') + day + '/' +
	((''+month).length<2 ? '0' : '') + month + '/' +
	d.getFullYear();

	today = today.split("/")
	today = new Date(today[2], today[1] - 1, today[0])
	var comp = s.split("/")
	comp = new Date(comp[2], comp[1] - 1, comp[0])
	
	return comp > today ? false : true
}

function dmy2date(s) {
	var dt = s.split("/")
	return new Date(+dt[2], dt[1] - 1, +dt[0])
}