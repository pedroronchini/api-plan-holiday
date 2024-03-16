
# Holiday Plan API
This is an API system for managing holiday plans. It provides endpoints for creating, listing, viewing, updating, and deleting holiday plans. Additionally, there is an endpoint for generating a PDF for a specific holiday plan.

## Endpoints
### Create a new holiday plan
URL: /api/storePlanHoliday
Method: POST
Body Parameters: JSON containing holiday plan details (title, description, date, location, participants)
Success Response: JSON containing the newly created holiday plan with HTTP status 201
Error Response: JSON containing validation errors with HTTP status 400

### Retrieve all holiday plans
URL: /api/showPlanHoliday
Method: GET
Success Response: JSON containing all holiday plans with HTTP status 200

### Retrieve a specific holiday plan by ID
URL: /api/showPlanHoliday/{id}
Method: GET
URL Parameters: Holiday plan ID
Success Response: JSON containing the holiday plan with HTTP status 200
Error Response: JSON indicating that the holiday plan was not found with HTTP status 404

### Update an existing holiday plan
URL: /api/updatePlanHoliday/{id}
Method: PUT
URL Parameters: Holiday plan ID
Body Parameters: JSON containing the details of the holiday plan to be updated
Success Response: JSON containing the updated holiday plan with HTTP status 200
Error Response: JSON containing validation errors with HTTP status 400 or indicating that the holiday plan was not found with HTTP status 404

### Delete a holiday plan
URL: /api/deletePlanHoliday/{id}
Method: DELETE
URL Parameters: Holiday plan ID
Success Response: JSON indicating that the holiday plan was deleted with HTTP status 200
Error Response: JSON indicating that the holiday plan was not found with HTTP status 404

### Generate a PDF for a specific holiday plan
URL: /api/generatePdfPlanHoliday/{id}
Method: GET
URL Parameters: Holiday plan ID
Success Response: JSON containing the URL of the generated PDF with HTTP status 200
Error Response: JSON indicating that the holiday plan was not found with HTTP status 404 or internal errors with HTTP status 500
Running the Project Locally
To run this project locally, follow the steps below:

## Clone this repository to your local machine.
Install Composer dependencies by running composer install.
Copy the .env.example file to .env and configure necessary environment variables such as database and Passport API credentials.
Generate an application key using the command php artisan key:generate.
Run database migrations using the command php artisan migrate.
Start the local server using the command php artisan serve.
You can now access the API through the local server, usually at http://localhost:8000/api/documentation.

## Dependencies
This project depends on the following technologies/frameworks:

Laravel: PHP framework for web development.
Passport: For OAuth2 authentication.
L5Swagger: For documentation

## Authors
Pedro Henrique Ronchini - Developer