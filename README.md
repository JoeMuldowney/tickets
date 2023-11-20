# tickets
This initiative aimed to establish a ticketing system for addressing technical issues and streamline user interactions by diverting them from sending direct emails to the IT department. 
Additionally, this system served as a robust tracking tool for efficient issue resolution.

## Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Usage](#usage)



# Overview

I took complete ownership and was the sole developer behind this project by designing, developing, and maintaining a web application using XAMPP as the server environment. The application was integrated with MS Access database tables and a MySQL database. I managed all aspects of the project, including database design, front-end and back-end development, and deployment.

I utilized a stack of web development tools, including PHP, HTML, and CSS, and incorporated some JavaScript and JQuery. The final web application was seamlessly deployed on the company's intranet WordPress homepage, where I successfully navigated specific configuration and security considerations.

At the outset of this project, I faced the challenge of having limited prior knowledge of PHP and minimal experience with HTML and CSS. However, I took on the challenge and dedicated myself to learning these technologies as part of the project. This learning curve allowed me to design, develop, and maintain the web application and acquire a proficient skill set in PHP, HTML, and CSS. Overcoming this challenge reinforced my commitment to continuous learning and skill development, resulting in a successful project completion.


# Features

1. **Main Dashboard:**
   - The Main Dashboard provides a comprehensive overview of tickets within the system.
   - **Role-Based Visibility:**
     - Members of the MIS department have access to view all tickets created, ensuring a centralized view of the entire system's activity.
     - Regular users will see a personalized view, displaying only the tickets created with their username for a more focused and relevant experience.
   - **Interactive Functionality:**
     - Users, regardless of their role, can seamlessly interact with the dashboard.
     - View your tickets directly from the dashboard, facilitating quick access to the status and details of your assigned or created tickets.
     - Create new tickets or update existing ones directly from the dashboard, streamlining the process of submitting and managing issues.
   - **Efficient Ticket Management:**
     - The Main Dashboard acts as a hub for users to efficiently navigate and perform key actions related to ticket management.
     - Enhances user productivity by consolidating important ticket-related functions into a single, user-friendly interface.

2. **Ticket Status Toggle:** Easily filter and view open or closed tickets.
   - Users can toggle between open and closed ticket views for better organization.
   - This functionality streamlines the user's experience by allowing them to focus on either active, unresolved issues (open tickets) or previously resolved ones (closed tickets).
   - Helpful for teams managing a high volume of tickets, providing a quick way to prioritize and address ongoing tasks.
   - Improves efficiency in tracking and managing the ticketing system by offering a clear distinction between different ticket statuses.


3. **Live Search:**
   - The Live Search feature enhances the ticket management experience with real-time search capabilities.
   - **Dynamic Filtering:**
     - As you type in the search bar, the system dynamically filters and displays results, providing instant feedback.
   - **Efficient Information Retrieval:**
     - Users can quickly locate specific tickets or topics without reloading the page, improving the efficiency of information retrieval.
   - **User-Friendly Interface:**
     - The live search functionality is seamlessly integrated into the user interface, creating an intuitive and user-friendly experience.
   - **Enhanced Navigation:**
     - Navigate through extensive ticket data effortlessly, making it easy to find relevant information even in large datasets.
   - **Responsive and Fast:**
     - The live search feature is designed to be responsive and fast, ensuring a smooth user experience even with substantial amounts of data.

4. **Email Notifications for Ticket Status:**
   - Users receive timely and relevant email notifications about the status of their submitted tickets.
   - **Automated Communication:**
     - The system automatically sends notifications to users when there are updates or changes to the status of their tickets.
   - **Real-Time Updates:**
     - Stay informed in real-time about ticket resolutions, comments, or any other changes, keeping users in the loop without the need to actively check the system.
   - **Efficient Communication:**
     - Enhances communication efficiency between users and the ticketing system, reducing the need for manual follow-ups.


# Usage

Prerequisites

1. **XAMPP Installation:**
   -Download and install XAMPP, which includes PHP version 8.0.28, Apache, and MySQL. You can find the download link [here](https://www.apachefriends.org/download.html).

2. **Configure Apache for PDO Connections:**
   -Open the XAMPP Control Panel, navigate to Apache, and edit the php.ini file. Locate the line ;extension=pdo_odbc and remove the semicolon. Save the changes and restart Apache.

3. **Microsoft Access Database Engine:**
Download and install the Microsoft Access Database Engine 2016 Redistributable from this [link](https://www.microsoft.com/en-us/download/details.aspx?id=54920).

4. **Database Setup:**
   -Create MySQL Database:
In PHPAdmin, create a new database named "ticket."

Import Database Schema:
Import the SQL file ticket.sql into the "ticket" database.

Open MySQL Command Line or MySQL Workbench.

-- Create a new MySQL user

CREATE USER 'mis'@'localhost' IDENTIFIED BY 'Mysql123';

-- Grant all privileges to the user for a specific database

GRANT ALL PRIVILEGES ON your_database.* TO 'mis'@'localhost';

Move Access Database File:

Move the file users.accdb to the folder C:\xampp\cgi-bin.

User Credentials

User Accounts:

Two pre-configured login names are available:
"muldowneyj" with admin rights.
"testuser" with user rights.



