# restaurants api

This is and Api-Centri Project that enables Servivce Providers (Food Vendor/Restaurants in this case) manage the service with ease and also handles Payment and Email Confirmation Process.

Its Frontend Views Can be found in: https://github.com/donmode/restaurants-view/

The api is built on the following technologies:

PHP: Laravel 7 Framework
MySQL Database
Email Service Provider: GMail
Payment GateWay: Paystack

How to Install:
1.) Either Download the Zipped Fill or Clone at the repository: https://github.com/donmode/restaurants
2.) Make a copy of the .env.example file into .env file and :
i.) Create a database for the project and Set up database configuration in the .env file
ii.) Proceed to https://paystack.com/developer and set up a free developer account (Secret Key and Public key will be generated for you to use in integrating with the payment gateway), The generated keys should be store in the .env file
iii.) Set up your Gmail Smtp Credentials
3.) Create a database migration, this will migrate all the necesary tables to the already created Database

You can use Database Seed to generate Pseudo-data if need in the CLI
