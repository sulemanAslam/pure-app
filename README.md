Description:

This a an application where you can create a dog by providing details such as name, age, breed and any allergies. The main purpose for using this is to be able to show a list of suitable recipes for a dog and then allow a user to choose a recipe they would like to subscribe to. 

For future implementation, I would like take this application a step further and set up a delivery system where every 5 minutes there is a job runnning to check for any new subscriptions. I would also like to add functionality for a user to create logins and save their subscriptions or any previous orders.

Installation:

. Make sure you have a web server package installed and running such as XAMP.
. Download the github files for this project and open them up in an IDE of your choice.
. Generate the vendor folder and migrations by running the following commands:
composer update
php artisan migrate:fresh --seed
. Run the application with the following command:
php artisan serve
. Once this command has started to run you can visit the application with the provided url in the console. (http://127.0.0.1:8000)

How to use the project:

. Once the application is up and running you should see a page where you can add details for your dog.
. Fill in the details and click the submit button.
. This should take you to a page where you can see a list of dogs and the suitable recipes for them. The dog you have added should show in the top row. 
. In the last column you can choose a recipe from the list of suitable recipes and save it into a database.