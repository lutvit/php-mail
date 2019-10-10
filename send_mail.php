/**
 * Send email with PHP (custom function)
 *
 * by Vitali Lutz 2019
 *
 * @param mixed $recipient (array, string)
 * @param mixed $sender (array, string)
 * @param string $subject
 * @param string $message
 * @param boolean $is_html
 * @return boolean
 */
function send_mail($recipient = '', $sender = '', $subject = '', $message = '', $is_html = false) {

  // Detect HTML markdown
  if (substr_count($message, '</') >= 1) {
    $is_html = true;
  }

  // Recipient details
  $recipient_name = '';
  $recipient_email_address = '';

  if (is_array($recipient)) {
    $recipient_name = $recipient[0];
    $recipient_email_address = $recipient[1];

    $to = '=?UTF-8?B?' . base64_encode($recipient_name) . '?= <' . $recipient_email_address . '>';
  } else {
    $recipient_email_address = '';
    $to = $recipient;
  }

  // Sender details
  $sender_name = '';
  $sender_email_address = '';

  if (is_array($sender)) {
    $sender_name = $sender[0];
    $sender_email_address = $sender[1];

    $from = '=?UTF-8?B?' . base64_encode($sender_name) . '?= <' . $sender_email_address . '>';
  } else {
    $from = $sender;
  }

  // Determine content type
  $content_type = 'text/plain';
  if ($is_html) {
    $content_type = 'text/html';
  }

  // Subject
  $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

  // Mail headers
  $header  = 'MIME-Version: 1.0' . "\r\n";
  $header .= 'Content-type: ' . $content_type . '; charset=utf-8' . "\r\n";
  $header .= 'Content-Transfer-Encoding: base64' . "\r\n";
  $header .= 'Date: ' . date('r (T)') . "\r\n";

  $header .= 'From: ' . $from . "\r\n";
  $header .= 'Reply-To: ' . $from . "\r\n";
  $header .= 'To: ' . $to . "\r\n";

  $header .= 'X-Mailer: PHP ' . phpversion();

  if (mail($recipient_email_address, $subject, base64_encode($message), $header)) {
    return true;
  } else {
    return false;
  }
}
