<style type="text/css">
	body{
	  background: url('bg-01.jpg')  no-repeat center center fixed;
	  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	}
	fieldset{
  		/*border: 1px solid rgb(255,232,57);*/
  			
  		margin:auto; 
  		height: 900px;
  		background-color: white;
	}

	:root {

    --input-color: #99A3BA;
    --input-border: #CDD9ED;
    --input-background: #fff;
    --input-placeholder: #CBD1DC;

    --input-border-focus: #275EFE;

	}
	.form-field {
	    display: block;
	    width: 70%;
	    padding: 8px 16px;
	    line-height: 25px;
	    font-size: 14px;
	    font-weight: 500;
	    font-family: inherit;
	    border-radius: 6px;
	    -webkit-appearance: none;
	    color: var(--input-color);
	    border: 1px solid var(--input-border);
	    background: var(--input-background);
	    transition: border .3s ease;
	    &::placeholder {
	        color: var(--input-placeholder);
	    }
	    &:focus {
	        outline: none;
	        border-color: var(--input-border-focus);
	    }
	}
	* {
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    box-sizing: border-box;
	}
	.buttons {
    	margin: 10%;
    	text-align: center;
	}
	.btn-hover {
	    width: 200px;
	    font-size: 16px;
	    font-weight: 600;
	    color: #fff;
	    cursor: pointer;
	    margin: 20px;
	    height: 55px;
	    text-align:center;
	    border: none;
	    background-size: 300% 100%;

	    border-radius: 50px;
	    moz-transition: all .4s ease-in-out;
	    -o-transition: all .4s ease-in-out;
	    -webkit-transition: all .4s ease-in-out;
	    transition: all .4s ease-in-out;
	}
	.btn-hover:hover {
	    background-position: 100% 0;
	    moz-transition: all .4s ease-in-out;
	    -o-transition: all .4s ease-in-out;
	    -webkit-transition: all .4s ease-in-out;
	    transition: all .4s ease-in-out;
	}

	.btn-hover:focus {
	    outline: none;
	}

	.btn-grad {background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)}
	.btn-grad:hover { background-position: right center; }

	.btn-hover.color-1 {
	    background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%);
	    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
	}
</style>
<html>
<head>
<meta charset="utf-8">
<title>SignUp Student | Mess Management</title>
</head>
<body>
	<br><br>
	<row>
	<col col-sm-4>
	<form class="student_registration" action="" method="post" name="stu_reg">
	<fieldset style="width: 500px;margin-top: 100px;">
	<h1 style="text-align: center;">SIGNUP STUDENT</h1>
		<div style="margin-left: 100px;">
			
			<br>
		
			<label>Student Name</label>
			<input type="text" class="form-field" name="student_name" placeholder="Name"><br>
			<label>E-Mail</label>
			<input type="text" class="form-field" name="e-mail" placeholder="E-Mail"><br>
			<label>Roll No</label>
			<input type="text" class="form-field" name="rollno" placeholder="Roll No"><br>
			<label>Password</label>
			<input type="text" class="form-field" name="password" placeholder="password"><br>
			<label>Student Name</label>
			<input type="text" class="form-field" name="student_name" placeholder="Name"><br>
			<label>Password Confirmation</label>
			<input type="text" class="form-field" name="password_confirmation" placeholder="password_confirmation"><br>
			<label>Mess Name</label>
			<input type="text" class="form-field" name="mess_name" placeholder="mess_name"><br>
			<label>Room No</label>
			<input type="text" class="form-field" name="roomno" placeholder="roomno"><br>

			<input type="submit" value="Sign Up" class="btn-hover color-1" name="login-input">
			<div style="margin-left: 95px;"><a style="text-decoration: none; font-size: 17px; color: rgba(0, 0, 0, 0.6);" onMouseOver="this.style.color='purple'" onMouseOut="this.style.color='rgba(0, 0, 0, 0.6)'" href="login.php">Login</a></div>
		
		</div>
	</fieldset>
	</col>
	</row>
	
  </form>
</body>
</html>
