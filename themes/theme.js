function showMenu() {
	document.getElementById('menu').style.display = 'none';
	document.getElementById('topPanel').style.display = 'block';
};


function hideMenu() {
	document.getElementById('menu').style.display = 'block';
	document.getElementById('topPanel').style.display = 'none'
};

// panel

function tired() {
	var alert;
	if (confirm(' ♫ ♬♩ ☼ Time for your tea. ♫ ♬♩ ☼ ') == true) {
		alert = "";
	}
}
//tea time msg

function autogrow(textarea) {
	var adjustedHeight = textarea.clientHeight;
	adjustedHeight = Math.max(textarea.scrollHeight, adjustedHeight);
	if (adjustedHeight > textarea.clientHeight) {
		textarea.style.height = adjustedHeight + 'px';
	}
}

//textarea自動增高

function confirmDelete() {
	if (alert('Delete this one. Start a new one!')) {
		location.href = 'finalOutput.php';
	}
}
//delete confirm

function confirmDownload() {
	if (alert('即將開始下載')) {
			location.href = 'finalOutput.php';
		}
	}
//download confirm
