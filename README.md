# csrf-attack 
A basic demo of a CSRF attack for our cybersecurity project :shield:

## Aim 
Perform CSRF attack and write down the steps to perform it. Also identify the specific
vulnerability for this attack and suggest the existing defense mechanisms and their
effectiveness. With reference to this propose at least one improvement or your idea for the
defense mechanism of the said attack.

## Team Members
Meera Wadher<br>
Reshmika Nambiar<br>
Sarah Tisekar


## Project Report :page_facing_up:
<a href="https://drive.google.com/file/d/1GqoYllYsBalhrgwYxC3gcaQgsXLx1MRc/view?usp=sharing" target="_blank" rel=”noreferrer”>Click to view</a>


## PPT
<a href="https://drive.google.com/file/d/1ndLb-XkornTDNqGo9rFuTSFiZ97n3J5C/view?usp=sharing" target="_blank" rel=”noreferrer”>Click to view</a>


## Setup :desktop_computer:

We've installed Apache Server & PhpMyAdmin on our Ubuntu System.

### Database Setup :

create database database_name;

Table for users :
create table users(user_id varchar(255) NOT NULL, user_name varchar(30), password
varchar(30) NOT NULL, email varchar(30) NOT NULL, balance int, PRIMARY KEY (user_id))

Table for tickets :
create table ticket(res_id varchar(255), source varchar(30), destination varchar (30),
no_of_tickets int, email varchar(30), price_of_one int, total_price int)


## ToDo :memo:
- Make the server.php file actually connect to the main application so the user really does click on it :upside_down_face:
- Optimize the code
- Make a proper structure for the code
