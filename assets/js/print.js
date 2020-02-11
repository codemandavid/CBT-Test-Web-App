function printer(){
window.print();
}

function decision(){
var response = confirm("Are you sure you want to delete this Position ?");
return response;
}
function decision_l(){
var response = confirm("Are you sure you want to delete this Level?");
return response;
}
//basorunolakunle@gmail.com
function social(){

var element = document.getElementById("social");
var textHeight = element.rows;
element.rows='5';
 element = document.getElementById("social");
 textHeight = element.rows;
 
//alert(textHeight);
}
function socials(){

var element = document.getElementById("soc");
var textHeight = element.rows;

element.rows='5';
 element = document.getElementById("soc");
 textHeight = element.rows;

}
//goldtracks2001@yahoo.com//sonbeam
//08030777102
//Reminder: Cultural Day holds tomorrow Friday Nov.22,2013 commencing at 11:30am.
 //All pupils are to be in their traditional attires. All parents are invited. 
//08160127745
function textarea(){
//alert(document.activeElement.nodeName);)
//alert(document.activeElement.nodeName);
if(document.activeElement.nodeName!='TEXTAREA' && document.getElementById("social").value==''){
var element = document.getElementById("social");
var textHeight = element.rows;
element.rows='2';
}
window.setTimeout("textarea()",50);
}

function setarea(){
if(document.activeElement.nodeName!='TEXTAREA' && document.getElementById("soc").value==''){
var element = document.getElementById("soc");
var textHeight = element.rows;
element.rows='2';
}
window.setTimeout("setarea()",50);
}
function bye(){
alert("Thanks For Voting, Bye......");
}

//here is where we check whether the password matches or not
function password_match(){
var initial = document.getElementById("initial").value;
var finall = document.getElementById("final").value;
if(initial==finall){
document.getElementById("show").innerHTML="<i><span style=' font-size:3; color:#007efd;' >Password Match</span></i>";
}
else{
document.getElementById("show").innerHTML="<i><span style=' font-size:3; color:#f89943;'>Password Does Not Match</span></i>";
}
}

function change_pword(){
var initial = document.getElementById("initial").value;
var finall = document.getElementById("final").value;
if(initial==finall){
return true;
}
else{
alert("Password Does not match");
return false;

}

}

function checkform(reg){
if(reg.name.value!=''&& reg.fname.value!=''&& reg.username.value!='' && reg.matric.value!='' && reg.level.value!='' && reg.pword.value==reg.cpword.value){
return true;

}
else if(reg.pword.value !=reg.cpword.value){
alert("Your Password doesn't match");
return false;
}
else{
alert("Please fill in all the fields");
return false;
}
alert("Whats up");

}