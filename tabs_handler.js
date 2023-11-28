function openTab(evt, tabId) {
	let tabcontent, tablinks;

	tabcontent = document.querySelectorAll(".tabcontent");
	for (let i = 0; i < tabcontent.length; i++)
		tabcontent[i].style.display = "none";

	tablinks = document.querySelectorAll(".tablinks");
	for (let i = 0; i < tablinks.length; i++)
		tablinks[i].className = tablinks[i].className.replace(" active", "");

	document.getElementById(tabId).style.display = "block";
	evt.currentTarget.className += " active";
}

function createTab(data) {
	let tabDataContainer = document.getElementById('tabDataContainer');
	let tabLinksContainer = document.getElementById('tabLinksContainer');

	let tabContentID = data.number.toString() + data.title;

	let tabContent = document.createElement('section');
	tabContent.classList.add('tabcontent');
	tabContent.setAttribute('id', tabContentID);
	let paragraph = document.createElement('p');
	paragraph.textContent = data.data;
	tabContent.append(paragraph);

	let tabButton = document.createElement('button');
	tabButton.classList.add('tablinks');
	tabButton.onclick = () => openTab(event, tabContentID);
	tabButton.textContent = data.title;

	tabDataContainer.append(tabContent);
	tabLinksContainer.append(tabButton);
}

function createAllTabs(data, from) {
	for(let i = from; i < data.length; ++i)
		createTab(data[i]);
}

async function fetchUpdates() {
	let response = await fetch('get_data.php');
	let data = await response.json();

	let tabDataContainer = document.getElementById('tabDataContainer');
	if(data.length > tabDataContainer.childElementCount)
		createAllTabs(data, tabDataContainer.childElementCount);
	setTimeout(() => fetchUpdates(), 5000);
}