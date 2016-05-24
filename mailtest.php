require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-4c7df61dcd7af81bc44c1bd1cab53e6b');
$domain = "sandboxcb89a5512d04466097291bd4e0e0b146.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandboxcb89a5512d04466097291bd4e0e0b146.mailgun.org>',
                        'to'      => 'Jason <zyol@outlook.com>',
                        'subject' => 'Hello Jason',
                        'text'    => 'Congratulations Jason, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));