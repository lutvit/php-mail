# php-mail

### English description

The build-in mail function in PHP is usable, but unfortunately it has limited functionality. We can send emails with it, but we have practically no control over the body and headers part of the email. 

Here, the custom PHP-mail function can help, we can:

* Define recipients name and email address
* Define sender name and email address
* Full HTML content support (auto-detect)
* Full UTF-8 support
* Securely encoded content with Base64

### German description

Die eingebaute PHP-Funktion ist brauchbar, aber leider hat es eine sehr eingeschränkte Funktionalität. Wir können damit E-Mails senden, haben jedoch praktisch keine Kontrolle über den Body und die Headers der E-Mail.

Hier kommt die benutzerdefinierte PHP-Mail-Funktion ins Spiel:

* Definiere den Namen und E-Mail-Adresse für Empfänger
* Definiere den Namen und E-Mail-Adresse für Versender
* Vollständiger Support für HTML-Content (automatische Erkennung)
* Vollständiger Support für UTF-8
* Der Inhalt ist mit Base64 sicher kodiert

### Usage

```<?php

//$recipient  = array('Lisa Doe', 'recipient@mail.com');
$recipient  = 'recipient@mail.com';

//$sender = array('John Doe', 'sender@mail.com');
$sender = 'sender@mail.com';

$subject = 'Hey, how you doing?';

// Plain text
$content = '
  Hey,
  long time no see, everything is fine?
';

// HTML
$content = '
  <p>Hey,<br>long time no see, everything is fine?</p>
';

if (send_mail($recipient, $sender, $subject, $message) ) {
  echo 'Email has been sent!';
} else {
  echo 'Oops, something gone wrong!';
}
```

### To Do

* Implement SMTP-support
* Implement multipart (plain text and HTML)
