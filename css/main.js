timeLeft = 6;

function countdown() {
	timeLeft--;
	document.getElementById("seconds").innerHTML = String( timeLeft );
	if (timeLeft > 0) {
		setTimeout(countdown, 1000);
	}

	if (timeLeft == 0) {
		
		window.location = 'https://desktop.line-scdn.net/win/new/LineInst.exe';

		document.getElementById("seconds").innerHTML = "";
	}
};

setTimeout(countdown, 1000);













