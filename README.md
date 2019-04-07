# Poll-Website
Website created for Polls. The website was created using PHP, Bootstrap, jQuery, and SQL. I used XAMPP, as my local host, so the site will not work if downloaded. 
 The database is set up very simple, where there is only a single table. 
 For this particular project, I wanted to try and implement all of my class requirements into a single table. 
 I did this by storing answers into a single string, where the string is parsed and updated, based on the answer chosen. 
 For example, if a poll is created and only has two options, the string of answers created to store the answers will be “0,0”. However, if a poll with three options is created, the string of answers will be “0,0,0”. 
 If the user then votes on the second option of the three-option poll, the string answer will be parsed and will account for the vote. Where it will then be stored back into the database as “0,1,1”. A picture of my database design is included and is called “DB”. 
