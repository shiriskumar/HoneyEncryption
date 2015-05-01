<html>
<head>
  <meta charset="UTF-8">
  <title>Session Time Out</title>
  <link rel="stylesheet" href="css/session.css" media="screen" type="text/css" />
  <style>
		body {
				font: normal 22px/26px "Open Sans Condensed", sans-serif;
				background: #454d62 url(images/bg.jpg) no-repeat center center;
				background-attachment: fixed;
				background-size: cover;
		}
	.semi-transparent-button {
			  display: block;
			  box-sizing: border-box;
			  margin: 0 auto;
			  padding: 8px;
			  width: 80%;
			  max-width: 200px;
			  background: #fff
			  background: rgba(255, 255, 255, 0.5);
			  border-radius: 8px;
			  color: #fff;
			  text-align: center;
			  text-decoration: none;
			  letter-spacing: 1px;
			  transition: all 0.3s ease-out;
		}
		.semi-transparent-button:hover,
		.semi-transparent-button:focus,
		.semi-transparent-button:active {
			  background: #fff;
			  color: #000;
			  transition: all 0.5s ease-in;
		}
				
		.is-blue {
			  background: #1e348e; /* fallback color for old browsers */
			  background: rgba(30, 52, 142, 0.5);
		}
		.is-blue:hover,
		.is-blue:focus,
		.is-blue:active {
			  background: #1e348e; /* fallback color for old browsers */
			  background: rgb(30, 52, 142);
			  color: #fff;
		}
</style>
</head>
<body>
	<center></br></br></br></br></br>
	<h2><font color=white>Your session has timed out.</font></br></br>
    <a class="semi-transparent-button is-blue" href="login">login</a>
   </h2></center>
</body>
</html>