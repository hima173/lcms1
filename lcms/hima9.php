<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>About Me</h2>
<p>A passion for justice. The experience for win.</p>

<div class="container">
  <div class="row">
   
    <div class="column">
      <form action="/action_page.php">
        <br><label for="fname">First Name : Gopal subhramaniam</label></br>
		<br><label for="Education">Education  : LLB and LLM</label></br>
		<br><label for="Address">Address : Krishna Complex , surat, Gujarat</label></br>
        <br><label for="Hours">Hours : Open - Closed (9:00 am to 9:00 pm)</label></br>
        <br><label for="Health and safety">Health and Safety : Appointment required, Mask Required </label></br>
		<br><label for="Appointment">Appointment : www.gopalindia.com</label></br>
        <br><label for="phone no">Phone no : 9854763210</label></br>
        <br><label for="Experience"> Experience :30 years experienced in the law field </label></br>
       
      </form>
    </div>
  </div>
</div>

</body>
</html>
