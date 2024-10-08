# Email API

This project is a Laravel-based REST API for sending emails. It uses OAuth2 for authentication, processes email sending through a queue, and stores email details in a PostgreSQL database. The application is containerized using Docker and Docker Compose.

## Features

- OAuth2 Authentication
- Email Sending via Queues
- Storing Sent Emails in PostgreSQL
- API Documentation
- Docker and Docker Compose Setup

## Requirements

- PHP 8.0 or higher
- Composer
- Docker
- Docker Compose
- PostgreSQL

## Installation
- create .env file for configuration
- run composer install
- run docker container.
    can use this base command line: docker-compose up

## Curl to call the API
curl --location --request POST 'http://{url}/api/send-email' \
--header 'Authorization: Bearer {token}' \
--header 'Content-Type: application/json' \
--data-raw '{
  "to": "sample.email@example.com",
  "subject": "Subjet of mail",
  "body": "Body of mail."
}'

response expectation:
{
  "message": "Email is being processed."
}
#   8 c a f c 8 0 1 e 5 8 7 e b 2 4 6 9 f 4 0 a b 0 7 8 3 0 c c c 5  
 