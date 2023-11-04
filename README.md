# Crypto Platform Automation

## Application Design

- Year: 2021

## Problem Statement
In a year marked by a global pandemic, cryptocurrencies have emerged as one of the most prominent topics of interest. As a part of a community of cryptocurrency investors and users of applications related to cryptocurrencies, I noticed that certain actions within the cryptocurrency domain required a significant amount of time and could benefit from automation.

To address this need, I developed a script to automate these actions for myself. After witnessing its effectiveness, I decided to create a web platform, that would offer members of our community the opportunity to automate these actions in exchange for a subscription fee. This is how AutoPonzi was born.

## Requirements Specification
- Account creation
- User login
- Payment system
- Organization of purchased packages
- Smooth navigation between website pages
- Providing a user-friendly interface

## Implementation Details
The website is built using HTML and CSS, with the Bootstrap framework enhancing the user interface design. For the backend, which handles user account creation, user access, subscription purchases, and communication with the database, PHP is utilized.

The automation component is powered by Python, utilizing the Selenium framework and the Chrome Headless module. This automation module is centrally managed on an Amazon Web Services (AWS) EC2 instance, ensuring efficient execution and scalability.

## User Guide
Upon opening the first page, the user can create an account or log in. Once logged in, the user can view active subscriptions, create new subscriptions, and make payments to purchase credits required for creating a new subscription. Logging out can be done through the red button in the navbar, and exiting the application is achieved by clicking the exit button in the top-right corner of the page.
