<html>

<head>
<title>Drop Down</title>
<style type="text/css">
.header * {
margin:0; padding:0;
}
.header {
behavior:url(../../lib/js_tools/csshover.htc);
font-family:lucida, arial, sans-serif;
background:#c0c0c0;
float:left;
}
.header ul {

float:left;
}
.header li {
border-right: 1px solid grey;
list-style-type:none;
float:left;
position:relative;
background-color:#DED;
cursor:pointer;
width:100px;
padding:20px;
}
.header li:first-child {
border-left:none;
}
.header li:hover{
background:#95ffff;
}
.header li active{
background:grey;
}
.header a {
display:block;
padding:.3em 6px;
color:#686;
text-decoration:none;
}
.header a:hover {
color:#DED;
background-color:#464;
}
.header li ul {
position:absolute;
display:none;
width:7em;
left:-1px;
}
.header li:hover ul {
display:block;
}
.header li:hover ul li:hover{
background:red;
}
.header li ul li {
width:90%;
border-right:1px solid #686;
border-bottom:1px solid #686;
border-left:1px solid #686;
border-radius:2px;
}
.header li ul li:fi rst-child {
border-left:1px solid #686;
border-top:1px solid #686;
border-radius:2px;
}
* html .header li ul {
border-top:1px solid #686;
border-radius:2px;
}
</style>
</head>
<body>
<div class="header">
<ul>
<li>John Ojetunde
<ul>
<li>Ojetunde John</li>
<li>John Gan-an</li>
</ul></li>
<li>Name of me
<ul>
<li>Talk me</li>
<li>Me Talk</li>
</ul>
</li>
</ul>
</div>
</body>
</html>