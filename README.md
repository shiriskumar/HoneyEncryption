![HoneyEncryption](Resources/bee.gif)

# Honey Encryption

### Introduction:

This is an implementation of Honey Encryption. The term was tossed by `Ari Juels`(RSA Labs) & `Ronald L. Rivest`(MIT CSAIL) during the presentation of `The Password That Never Was` at Harvard's Center for Research on Computation and Society (CRCS)(2014).


#### Report:
[Latest major Password Breach Report [2011 - 2014]](http://goo.gl/xz2qNF) by Shiris Kumar


### Presentation:
[https://www.slideshare.net/shiriskumar/honey-encryption](https://www.slideshare.net/shiriskumar/honey-encryption)


### Modules:

The project has 3 Modules to simulate different user environments:

1. `honeydev` - Contains a set of login page with Honey Encryption implementation
2. `dashboard` - Is the site's administrator's page to monitor ongoing activities
3. `hacker` - Simulates the scenario of breaching password database and decrypting it at AWS.



### Requirements:

1. Python - to create Honeywords
2. WAMP/XAMPP - to create a localhost server
3. MSMTP - to emulate email server. Read [CONFIGURE MAIL SERVER](https://github.com/shiriskumar/HoneyEncryption/blob/master/CONFIGURE_MAIL_SERVER.md) to setup mail server at localhost.



### Links:

1. [Honeywords : Making Password-Cracking Detectable](http://www.arijuels.com/wp-content/uploads/2013/09/JR13.pdf)

2. Youtube : ["The Password That Never Was" (CRCS Lunch Seminar)](https://www.youtube.com/watch?v=DV0k0rQpEX4)
