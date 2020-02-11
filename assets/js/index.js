function fform(populate_subject){
if(populate_subject.subject_name.value==''||populate_subject.hr.value==''||populate_subject.min.value==''||populate_subject.sec.value==''){
alert("You can't submit an empty field");
return false;
}
else{
return true;
}



}

function sosure(){
var folder = document.getElementById("reset_user").value;
var answer = confirm("Are you sure you want to Reset User Database ?");
if(answer){
window.open("http://localhost/cbt/kitchen/"+folder,"_self");
}
else{

}
}
function sosureq(){
var folder = document.getElementById("reset_question").value;
var answer = confirm("Are you sure you want to Reset Question Database ?");
if(answer){
window.open("http://localhost/cbt/kitchen/"+folder,"_self");
}
else{

}
}
function reg(student_register){
var num = Math.floor(Math.random() * 90000) + 10000;
document.getElementById("exam_code").value = num;
if(student_register.firstname.value=='' || student_register.parent.value==''||student_register.surname.value==''||student_register.othername.value==''){
alert("Please Fill in all the Fields");
return false;
}else{
return true;
}
}
function printer(){
window.print();
}

function sform(populate_question){
if(populate_question.questions.value=='' || populate_question.subject.value==''){
alert("Please fill in all fields");
return false;
}
else{
return true;
}
}

function tform(populate_answer){
if(populate_answer.answers.value=='' || populate_answer.subject.value==''){
alert("Please fill in all fields");
return false;
}
else{

return true;
}
}


//Code to countdown
var t_sec; // A global variable to hold total time in seconds, will be changed during the course of the program
function start_timer()
{
	var hr =document.getElementById("hr").value;// supplied
	//alert(hr);
	var mn = document.getElementById("min").value; //supplied
	var ss =document.getElementById("sec").value; //supplied
	if(ss==0){
	ss='';
	}
	t_sec = (hr * 3600) + (mn * 60) + (ss);
 // converts all to seconds
	window.setTimeout("timer()",1); //calls another function to continue processing, start_timer() no longer useful
}

function timer()
{
	convert(t_sec); // another function whose job is to show the time on the page...
	t_sec = t_sec - 1; //counts down  by 1
	if(t_sec >= 0)again = window.setTimeout("timer()",1000); //repeats this every seconds until time == 0
	else { document.getElementById("submit").click(); }// When time is zero, clicks the submit button automatically//
}


function convert(my_arg)
{
	if(my_arg > -1)
	{
	hour = Math.floor(my_arg/3600); //calculates hours from remainig time
	mins = Math.floor((my_arg / 60)) ;
	while (mins >= 60) mins = Math.floor(mins % 60); //calcs minutes
	secs = my_arg % 60; //calculates seconds
	//mins = (mins > 60) ? (mins - 60) : mins;
	secs = (secs < 10) ? "0" + secs : secs; //padding where necesary for values 
	mins = (mins < 10) ? "0" + mins : mins;
	hour = (hour < 10) ? "0" + hour : hour;
	document.getElementById("r_hr").innerHTML = hour +":";
	document.getElementById("r_mn").innerHTML = mins+":"; // show them on page, updates every second
	document.getElementById("r_ss").innerHTML = secs;
	}
}

//How it works.
//The first function is called either onload of the page or if the user is required to click a button to start.
//The time would have been supplied as necessary in the page
//The time is converted to seconds and assigned to "t_secs" by the first function start_timer()
//the next function is called, and wat it does is to call a function that converts t_secs to minutes, hours, secs and shows that on the page every second
//then function timer reduces t_secs by 1 every seconds and wen t_sec == 0 i.e time is up, it automatically clicks the submit button 
//which must habe been given an ID of "submit"
