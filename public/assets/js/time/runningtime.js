function updateTime()
{
	const now = new Date();
	let hours = now.getHours();
	let minutes = now.getMinutes();
	let seconds = now.getSeconds();
	let amOrPm = "AM";

	// Convert 24-hour time to 12-hour time and determine AM or PM
	if(hours >= 12)
	{
		amOrPm = "PM";
		if (hours > 12)
		{
			hours -= 12;
		}
	}

	// Ensure 2-digit formatting for hours and minutes
	hours = String(hours).padStart(2, '0');
	minutes = String(minutes).padStart(2, '0');
	seconds = String(seconds).padStart(2, '0');

	const timeString = `${hours}:${minutes}:${seconds} ${amOrPm}`;
	document.getElementById("time").textContent = timeString;
}

	// Update the time immediately and then every second
	updateTime();
	setInterval(updateTime, 1000);