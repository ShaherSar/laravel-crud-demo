I created a simple laravel crud as requested

Used Laravel default driver to send emails.

The emails sent are queued inside an event which after sending an email,a column will be set to true in database

Make sure to change the queue driver to Database Or Redis for async jobs.

commands to run

php artisan migrate

php artisan queue:work

another terminal

run command : php artisan serve.


Shaher Al-Sarairah
Thank you
----------------------------------
1- Create user :

The Api has required parameters (name, date of birth, email, phone number).
Perform basic validation on the name, email, Phone number, DoB (age cannot be less than 18 years).
Use the relevant framework/suggested best practice (form validator).
Save data using MySQL DB and send welcome email to the user .

2- Get user info

result will be in Json format
