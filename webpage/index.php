<?php
	error_reporting(0);
	$isPost = $_SERVER["REQUEST_METHOD"] == "POST";
	$isGet = $_SERVER["REQUEST_METHOD"] == "GET";
	$name = $isPost ? $_POST['name'] : "";
	$email = $isPost ? $_POST['email'] : "";
	$username = $isPost ? $_POST['username'] : "";
	$password = $isPost ? $_POST['password'] : "";
	$confirm_password = $isPost ? $_POST['confirm_password'] : "";
	$date_of_birth = $isPost ? $_POST['date_of_birth'] : "";
	$gender = $isPost ? $_POST['gender'] : "";
	$marital_status = $isPost ? $_POST['marital_status'] : "";
	$address = $isPost ? $_POST['address'] : "";
	$city = $isPost ? $_POST['city'] : "";
	$postal_code = $isPost ? $_POST['postal_code'] : "";
	$home_phone = $isPost ? $_POST['home_phone'] : "";
	$mobile_phone = $isPost ? $_POST['mobile_phone'] : "";
	$credit_card_number = $isPost ? $_POST['credit_card_number'] : "";
	$credit_card_expiry_date = $isPost ? $_POST['credit_card_expiry_date'] : "";
	$monthly_salary = $isPost ? $_POST['monthly_salary'] : "";
	$website_url = $isPost ? $_POST['website_url'] : "";
	$gpa = $isPost ? $_POST['gpa'] : "";
	$name_Error = $isPost && !preg_match('/^[a-z ]{2,}$/i', $name);
	$email_Error = $isPost && !preg_match('/^[a-z0-9._%+-]+@[a-z0-9._-]+\.[a-z]{2,}$/i', $email);
	$username_Error = $isPost && !preg_match('/^[^\s]{5,}$/i', $username);
	$password_Error = $isPost && !preg_match('/^[^\s]{8,}$/i', $password);
	$confirm_password_Error = $isPost && strcmp($password, $confirm_password) != 0;
	$date_of_birth_Error = $isPost && empty($date_of_birth);
	$gender_Error = $isPost && !preg_match('/^(Male|Female)$/i', $gender);
	$marital_status_Error = $isPost && !preg_match('/^(Single|Married|Divorced|Widowed)$/i', $marital_status);
	$address_Error = $isPost && empty($address);
	$city_Error = $isPost && !preg_match('/^[a-z]+$/i', $city);
	$postal_code_Error = $isPost && !preg_match('/^[0-9]{6}$/i', $postal_code);
	$home_phone_Error = $isPost && !preg_match('/^[0-9]{9}$/i', $home_phone);
	$mobile_phone_Error = $isPost && !preg_match('/^[0-9]{9}$/i', $mobile_phone);
	$credit_card_number_Error = $isPost && !preg_match('/^[0-9]{16}$/i', $credit_card_number);
	$credit_card_expiry_date_Error = $isPost && empty($credit_card_expiry_date);
	$monthly_salary_Error = $isPost && !preg_match('/^UZS [1-9]{1}[0-9]{0,2}(,[0-9]{3})*.[0-9]{2}$/i', $monthly_salary);
	$website_url_Error = $isPost && !preg_match('/^(http|https|ftp):\/\/([a-z0-9]+\.)+[a-z]{2,}$/i', $website_url);
	$gpa_Error = $isPost && !preg_match('/^([0-3].[0-9]{2})|(4\.(([0-4][0-9])|[0-5]))$/i', $gpa);
	$isFormError = $name_Error || 
		$email_Error || 
		$username_Error || 
		$password_Error || 
		$confirm_password_Error || 
		$date_of_birth_Error || 
		$gender_Error || 
		$marital_status_Error || 
		$address_Error || 
		$city_Error  || 
		$postal_code_Error || 
		$home_phone_Error || 
		$mobile_phone_Error || 
		$credit_card_number_Error || 
		$credit_card_expiry_date_Error || 
		$monthly_salary_Error || 
		$website_url_Error || 
		$gpa_Error;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<style>
		<?php include '		 style.css'; ?>
		</style>
	</head>
	
	<body>

		<?php 
			if ($isGet || $isFormError) {
		?>

			<h1>Registration Form</h1>

			<form action="index.php" method="POST" auto>
				<p>
					This form validates user input and then displays "Thank You" page.
				</p>
				
				<hr />
				
				<h2>Please, fill below fields correctly</h2>
				
				<dl>

					<dt>Full Name 
						<span class="err_msg">
							<?= $name_Error ? "This field is required. It has to contain at least 2 chars and no numbers." : ""?>
						</span>
					</dt>
					<dd>
						<input id="name" type="text" name="name" value="<?= $name ?>" placeholder="Enter your full name" autocomplete="off">
					</dd>


					<dt>Email 
						<span class="err_msg">
							<?= $email_Error ? "This field is required. It should correspond to email format." : ""?>
						</span>
					</dt>
					<dd>
						<input id="email" type="text" name="email" value="<?= $email ?>" placeholder="Enter your email" autocomplete="off">
					</dd>


					<dt>Username 
						<span class="err_msg">
							<?= $username_Error ? "This field is required. It has to contain at least 5 chars." : ""?>
						</span>
					</dt>
					<dd>
						<input id="username" type="text" name="username" value="<?= $username ?>" placeholder="Enter your username" autocomplete="off">
					</dd>


					<dt>Password 
						<span class="err_msg">
							<?= $password_Error ? "This field is required. It has to contain at least 8 chars." : ""?>
						</span>
					</dt>
					<dd>
						<input id="password" type="password" name="password" value="" placeholder="Enter your password" autocomplete="off">
					</dd>


					<dt>Confirm password 
						<span class="err_msg">
							<?= $confirm_password_Error ? "This field is required. It has to be equal to Password field." : ""?>
						</span>
					</dt>
					<dd>
						<input id="confirm_password" type="password" name="confirm_password" value="" placeholder="Repeat your password" autocomplete="off">
					</dd>


					<dt>Date of Birth 
						<span class="err_msg">
							<?= $date_of_birth_Error ? "This is required field." : ""?>
						</span>
					</dt>
					<dd>
						<input id="date_of_birth" type="date" name="date_of_birth" value="<?= $date_of_birth ?>" autocomplete="off">
					</dd>


					<dt>Gender 
						<span class="err_msg">
							<?= $gender_Error ? "Only 2 options accepted: Male, Female." : ""?>
						</span>
					</dt>
					<dd>
						<input id="gender" type="text" name="gender" value="<?= $gender ?>" placeholder="Enter your gender" autocomplete="off">
					</dd>


					<dt>Marital Status 
						<span class="err_msg">
							<?= $marital_status_Error ? "Only 4 options accepted: Single, Married, Divorced, Widowed" : ""?>
						</span>
					</dt>
					<dd>
						<input id="marital_status" type="text" name="marital_status" value="<?= $marital_status ?>" placeholder="Enter your marital status" autocomplete="off">
					</dd>


					<dt>Address 
						<span class="err_msg">
							<?= $address_Error ? "This is required field." : ""?>
						</span>
					</dt>
					<dd>
						<input id="address" type="text" name="address" value="<?= $address ?>" placeholder="Enter your address" autocomplete="off">
					</dd>


					<dt>City 
						<span class="err_msg">
							<?= $city_Error ? "This is required field." : ""?>
						</span>
					</dt>
					<dd>
						<input id="city" type="text" name="city" value="<?= $city ?>" placeholder="Enter your city" autocomplete="off">
					</dd>


					<dt>Postal Code 
						<span class="err_msg">
							<?= $postal_code_Error ? "This is required field. It should follow 6 digit format. For ex, 100011" : ""?>
						</span>
					</dt>
					<dd>
						<input id="postal_code" type="text" name="postal_code" value="<?= $postal_code ?>" placeholder="Enter your postal code" autocomplete="off">
					</dd>


					<dt>Home Phone 
						<span class="err_msg">
							<?= $home_phone_Error ? "This is required field. It should follow 9 digit format. For ex, 971234567" : ""?>
						</span>
					</dt>
					<dd>
						<input id="home_phone" type="text" name="home_phone" value="<?= $home_phone ?>" placeholder="Enter your home phone" autocomplete="off">
					</dd>


					<dt>Mobile Phone 
						<span class="err_msg">
							<?= $mobile_phone_Error ? "This is required field. It should follow 9 digit format. For ex, 971234567" : ""?>
						</span>
					</dt>
					<dd>
						<input id="mobile_phone" type="text" name="mobile_phone" value="<?= $mobile_phone ?>" placeholder="Enter your mobile phone" autocomplete="off">
					</dd>


					<dt>Credit Card Number 
						<span class="err_msg">
							<?= $credit_card_number_Error ? "This is required field. It should follow 16 digit format." : ""?>
						</span>
					</dt>
					<dd>
						<input id="credit_card_number" type="text" name="credit_card_number" value="<?= $credit_card_number ?>" placeholder="Enter your credit card number" autocomplete="off">
					</dd>


					<dt>Credit Card Expiry Date 
						<span class="err_msg">
							<?= $credit_card_expiry_date_Error ? "This is required field." : ""?>
						</span>
					</dt>
					<dd>
						<input id="credit_card_expiry_date" type="date" name="credit_card_expiry_date" value="<?= $credit_card_expiry_date ?>" autocomplete="off">
					</dd>


					<dt>Monthly Salary 
						<span class="err_msg">
							<?= $monthly_salary_Error ? "This is required field. It should be written in following format UZS 200,000.00" : ""?>
						</span>
					</dt>
					<dd>
						<input id="monthly_salary" type="text" name="monthly_salary" value="<?= $monthly_salary ?>" placeholder="Enter your monthly salary" autocomplete="off">
					</dd>


					<dt>Web Site URL 
						<span class="err_msg">
							<?= $website_url_Error ? "This is required field. It should match URL format. For ex, http://github.com" : ""?>
							</span
						</dt>
					<dd>
						<input id="website_url" type="text" name="website_url" value="<?= $website_url ?>" placeholder="Enter your web site URL" autocomplete="off">
					</dd>


					<dt>Overall GPA 
						<span class="err_msg">
							<?= $gpa_Error ? "This is required field. It should be a floating point number less than 4.5" : ""?>
						</span>
					</dt>
					<dd>
						<input id="gpa" type="text" name="gpa" value="<?= $gpa ?>" placeholder="Enter your overall GPA" autocomplete="off">
					</dd>


				</dl>
				
				<div class="btn">
					<button type="submit">Register</button>
				</div>
			</form>

		<?php
			}
			else {
		?>	
			<form action="index.php">
				<h2>Thank you for registering!</h2>
				<div class="btn">
					<button type="submit">Create an account</button>
				</div>
			</form>
		<?php
			}
		?>
	</body>
</html>