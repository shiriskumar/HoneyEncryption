#How to configure your Linux / Mac OS X / Windows to send mails from msmtp



Sometimes one requires to send emails, without installing a full-fledged email server. So here is a short tutorial to get Up and going with msmtp for sending real mails.



###Prerequisites:

* Download msmtp from [Sourceforge](http://msmtp.sourceforge.net/). It probably stands for Martin's SMTP. It's available for almost all OSs. Its not limited to be used by PHP. One can also send mails via Command Line or any program/programming Language.

* If you don't have a Gmail account, either get one or substitute the settings.

* I assume that you are using Apache.



###Installation & Configuration for Linux and Mac:

* On Debian (& Ubuntu) msmtp should be just an apt-get away:

```
sudo apt-get install msmtp ca-certificates
```

* After installing it, we need to configure the file for it. Create a new file in /etc:

```
sudo touch /etc/msmtprc
sudo gedit /etc/msmtprc
```

* Now, paste the following code snippet into the file:

```
defaults
tls on
tls_starttls on
tls_trust_file /etc/ssl/certs/ca‐certificates. crt
account default
host smtp. gmail. com
port 587
auth on
user username@gmail. com
password mypass
from username@gmail. com
```

Make sure that you have changed your username and password to match your account.

#####Note : You might have to add an entry in the authorized list of application in your Google account and use that application specific password instead of your Gmail password.

* Change the file permissions:

```
sudo chmod 0644 /etc/msmtprc
```


###Installation & Configuration for Windows:

* Copy `msmtp.exe` to `Windows\System32` and add the location to global Path enviroment. 

* Download the certificate from the link below and save it as `ThawtePremiumServerCA_b64. txt` in `C: \ProgramData`. It is usually a hidden Folder in C Disk. [Certificate Link](http://www.geotrust.com/resources/root_certificates/certificates/Equifax_Secure_Certificate_Authority.pem).
	
* Create a file called `msmtprc.txt` in `C:\ProgramData`, with the following contents:

```
account gmail
host smtp.gmail.com
auth on
user username@gmail.com
password yourpassword
tls on
tls_starttls on
tls_trust_file "C:\ProgramData\ThawtePremiumServerCA_b64.txt"
port 587
from username@gmail.com
maildomain gmail.com
account default : gmail
```

Of course, you need to substitute username and  yourpassword.



###Test if it works:

Now we are ready to send mails.

Run the following code in Console or cmd.exe

```
echo -e "Subject: Test Mail\r\n\r\nThis is a test mail" | msmtp --debug --from=default -t username@gmail. com
```

Change the email address to match your actual email address.

It shall output a lot of Debug information, and hopefully execute without an error.

If you do get an authentication error, you need to add an entry to the Application­specific passwords in your Google account settings.

```
	[https://www.google.com/settings/security](https://www.google.com/settings/security)
	
```



###PHP Configuration:

* Edit PHP configuration file in Linux:

```
sudo gedit /etc/php5/apache2/php.ini
```

On Windows, the location of `php.ini` differs from installation to installation. In `Wampserver` you can use the system tray icon to edit php.ini.

* Setup `sendmail_path`:

```
sendmail_path = ' /usr/bin/msmtp -t'
```

In Windows, search for `[mail function]`, and edit/or add the following changes:

```
SMTP = localhost
smtp_port = 25
sendmail_from = username@gmail.com
sendmail_path = 'C:\Windows\System32\msmtp ­t'
mail.add_x_header = On
mail.log = C:\wamp\logs\mail_log.txt
extension=php_openssl.dll
```

* You can check where msmtp is installed by running following command, in Linux:

```
which msmtp
```

* Now you need to restart Apache. For Linux users run the following:

```
sudo /etc/init. d/apache2 restart
```

However for Windows users it differs from what program package you've installed. Wampserver has an icon in the system tray which you can use to restart Apache.

* Let's send a test mail using mail() function:

```php
<?php
if (mail(' yourusername@gmail. com' , ' Test email sent from localhost' , ' This works great! ' ))
	echo ' Mail sent' ;
else
	echo ' Error. Something is wrong. ' ;
?>
```

Again, change the email address to match your own.

Put the PHP file in your virtual host root folder and execute it through your browser.

Hopefully it works!



###Conclusion:

Now you don't need to use a third-party library for sending emails or configure your own email server.

You can now use msmtp to act like sendmail. And not only from PHP, but pretty much any program or programming language, including sending emails from the console.