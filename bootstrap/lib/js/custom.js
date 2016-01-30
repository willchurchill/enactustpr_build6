var $scrollcount=0;

function pageScroll(){
    if(window.pageYOffset>400 && $scrollcount<1) {
		
		var ctx = document.getElementById("totalhoursBarChart").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive : true
		});
		
		//document.getElementById("totalhoursiframe").src="totalhours.php";
		//document.getElementById("totalhourscontainer").innerHTML = "<iframe src='totalhours.php' onload='javascript:resizeIframe(this);'></iframe>";
		$scrollcount = parseInt($scrollcount) + 1;
	}
	if(window.pageYOffset>800 && $scrollcount<2) {
		
		var ctx1 = document.getElementById("piechart").getContext("2d");
			window.myPie = new Chart(ctx1).Pie(pieData);
		
		//document.getElementById("totalhoursiframe").src="totalhours.php";
		//document.getElementById("piechartcontainer").innerHTML = "<iframe src='piechart.php' onload='javascript:resizeIframe(this);'></iframe>";
		$scrollcount = parseInt($scrollcount) + 1;
	}
	if(window.pageYOffset>1400 && $scrollcount<3) {
		
		var ctx2 = document.getElementById("toptopicChart").getContext("2d");
			var myBarChart = new Chart(ctx2).Bar(toptopicData);
		
		//document.getElementById("totalhoursiframe").src="totalhours.php";
		//document.getElementById("piechartcontainer").innerHTML = "<iframe src='piechart.php' onload='javascript:resizeIframe(this);'></iframe>";
		$scrollcount = parseInt($scrollcount) + 1;
	}
}

function showhiddenfront() {
	document.getElementById('hiddenfrontpage').style.display="block";
	
	(function($) {
        $('#totalsupport').ScrollTo();
    })(jQuery);
}

//
// Show mentors
//

function popAllMentors() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			getAllMentors(xmlhttp.responseText);
		}
	};
	xmlhttp.open("GET", "../lib/php/mentorlist.php", true);
	xmlhttp.send();
}

function getAllMentors(response) {
	var arr = JSON.parse(response);
	var i;
	var out = "<table class='table table-striped mentortable' id='tprtable'>";
	out += "<thead><th id='mentorname' class='sort' data-sort='mentorname'>Mentor Name</th><th id='teams' class='sort' data-sort='teams'>Teams</th><th id='skills'>Skills<br />(General, Project, and Competition)</th><th id='training'>Professional Training</th><th id='mentortype' class='sort' data-sort='mentortype'>Mentor Type</th><th>Contact</th></thead>";
	out += "<tbody class='list'>";
	for (i = 0; i < arr.length; i++) {
		var gskills = arr[i].generalskills;
		var pskills = arr[i].projectskills;
		var cskills = arr[i].competitionskills;
		var skills = "";

		mentortype = arr[i].mentortype;
		if (mentortype == "Both") {
			mentortype = "Team and Specific";
		}

		for (var a = 0; a < gskills.length; a++) {
			if (gskills[a] > 4) {
				skills += "<b>";
				igskill = gskills.substring([a - 30], [a - 2]);
				lastcomma = igskill.lastIndexOf(",");
				igskill2 = igskill.substr(lastcomma + 1);
				skills += igskill2;
				skills += ", ";
				skills += "</b>";
			}
		}
		for (var b = 0; b < gskills.length; b++) {
			if (gskills[b] === "4") {
				igskill = gskills.substring([b - 30], [b - 2]);
				lastcomma = igskill.lastIndexOf(",");
				igskill2 = igskill.substr(lastcomma + 1);
				skills += igskill2;
				skills += ", ";
			}
		}
		for (var c = 0; c < pskills.length; c++) {
			if (pskills[c] > 4) {
				skills += "<b>";
				ipskill = pskills.substring([c - 30], [c - 2]);
				lastcomma = ipskill.lastIndexOf(",");
				ipskill2 = ipskill.substr(lastcomma + 1);
				skills += ipskill2;
				skills += ", ";
				skills += "</b>";
			}
		}
		for (var d = 0; d < pskills.length; d++) {
			if (pskills[d] === "4") {
				ipskill = pskills.substring([d - 30], [d - 2]);
				lastcomma = ipskill.lastIndexOf(",");
				ipskill2 = ipskill.substr(lastcomma + 1);
				skills += ipskill2;
				skills += ", ";
			}
		}
		for (var e = 0; e < cskills.length; e++) {
			if (cskills[e] > 4) {
				skills += "<b>";
				icskill = cskills.substring([e - 30], [e - 2]);
				lastcomma = icskill.lastIndexOf(",");
				icskill2 = icskill.substr(lastcomma + 1);
				skills += icskill2;
				skills += ", ";
				skills += "</b>";
			}
		}
		for (var f = 0; f < cskills.length; f++) {
			if (cskills[f] === "4") {
				icskill = cskills.substring([f - 30], [f - 2]);
				lastcomma = icskill.lastIndexOf(",");
				icskill2 = icskill.substr(lastcomma + 1);
				skills += icskill2;
				skills += ", ";
			}
		}
		skills = skills.slice(0, -2);
		var training = arr[i].generaltraining + " " + arr[i].projecttraining + " " + arr[i].competitiontraining;
		var otherdetails = training + " " + arr[i].beneficiarysgroups + " " + arr[i].projectdescription;
		//out += "<tr id='tprmouseover'><td class='mentorname' onclick='doNav(\"showmentor.htm?mentorid=" + arr[i].mentorid + "\");'>" + arr[i].mentorname + "</td><td class='teams' onclick='doNav(\"showmentor.htm?mentorid=" + arr[i].mentorid + "\");'>" + arr[i].teams + "</td><td class='expertise' onclick='doNav(\"showmentor.htm?mentorid=" + arr[i].mentorid + "\");'>" + skills + "</td><td class='professionaltraining' onclick='doNav(\"showmentor.htm?mentorid=" + arr[i].mentorid + "\");'>" + arr[i].professionaltraining + "</td><td class='mentortype' onclick='doNav(\"showmentor.htm?mentorid=" + arr[i].mentorid + "\");'>" + mentortype + "</td><td id='contact' class='contact'><a href='mailto:" + arr[i].mentoremail + "' target='_blank'>Contact</a></td><td class='othermentordetails'>" + otherdetails + "</td></tr>";
		out += "<tr id='tprmouseover'><td class='mentorname'>" + arr[i].mentorname + "</td><td class='teams'>" + arr[i].teams + "</td><td class='skills'>" + skills + "</td><td class='training'>" + arr[i].professionaltraining + "</td><td class='mentortype'>" + mentortype + "</td><td id='contact' class='contact'><a href='mailto:" + arr[i].mentoremail + "' target='_blank'>Contact</a></td><td class='othermentordetails'>" + otherdetails + "</td></tr>";
	}
	out += "</tbody></table>";
	document.getElementById("mentortable").innerHTML = out;
	var tprt = new List('mentorlistcontainer', options);
}