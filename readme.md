<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>



## About The Project

This project is developed by Alireza Mahmoudi with aim of fulfilling a code challenge assignment.
The project follows MVC design pattern and take advantage of Laravel framework. The following library, feature and technology are used in: 

1.	Eloquent ORM    
2.	Laravel Middleware
3.	Blade
4.	OAuth 2.0 
5.	JavaScript
6.	JQuery 
7.	Bootstrap 4
8.	Ajax
9.	MySQL 
10.	Guzzle


## How Application Works

After login to application through Twitch user account, the user is able to search its favorite streamers. If streamer is valid the application shows verification form. since user verify the account then it subscribe to a streamer and can be notified whenever it makes new follower, follow a new user or stream changes. According to Twitch documents, I’ve implemented some back-end code which are able to process twitch webhook and record all streamer activities in MySQL server. In the next panels, users can find their subscriptions and the last 10 their favorite streamer’s activities.  

On the second page (livestream), the user is able to watch a live stream and use its channel chat room. The next panel is designed to deal with a JavaScript websocket. According to Twitch document (Pubsub), I’ve implemented some JavaScript code which can communicate with Twitch server and establish a TCP connection. If user submit topics for example Whispers, it will be notified about real-time events.

## Questions:

Q1: 
To deploy a Laravel web site on AWS, first of all, we should determine about configuration files and migrate it to AWS platform. To record sessions, database and files, we can use ElastiCache, RDS and AWS S3 respectively. Generally we can follow below architecture.

Q2: 
To build a scalable solution, we should develop stateless process and dispatch the process to different servers. This enables us to have horizentall scalling and also we could take advantage of SNS and SQS features.   
