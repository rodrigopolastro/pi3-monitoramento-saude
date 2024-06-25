<?php
require '../sendgrid-credentials.php'; #
require '../vendor/autoload.php';

use \SendGrid\Mail\Mail;

if (!isset($_SESSION)) {
    session_start();
}

function scheduleDoseReminder($dose)
{
    $email = new Mail();
    $email->setFrom(EMAIL_SENDER, 'Monitoramento de Saúde');
    $email->setSubject('Você tem uma dose de medicamento para tomar!');
    $email->addTo($_SESSION['companion_user_email'], 'Example Recipient');

    $email_content = "
        <h1> Chegou a hora de tomar sua dose! </h1>
        <h3>Medicamento:" . $_SESSION['companion_user_email'] . "</h3> 
        <h3>Horário: " . $dose['due_date'] . ' às ' . $dose['due_time'] . '</h3>
        <p>Não desista, continue firme!</p>';

    $email->addContent('text/html', $email_content);
    $dose_time = DateTimeImmutable::createFromFormat(
        'Y-m-d H:i',
        $dose['due_date'] . ' ' . $dose['due_time'],
        new DateTimeZone('America/Sao_Paulo')
    );

    $email->setSendAt($dose_time->getTimestamp());
    $sendgrid = new \SendGrid(SENDGRID_API_KEY);
    try {
        // TODO: Check if it was really created and inform user
        $response = $sendgrid->send($email);
        // echo '<pre>';
        // echo "<h3>Criando lembrete para dose " . $dose['dose_id'] . "</h3>";
        // echo "Response status:" . $response->statusCode();

        // var_dump($response);
        // $headers = array_filter($response->headers());
        // echo "Response Headers\n";
        // foreach ($headers as $header) {
        //     echo " - " . $header . "\n";
        // }
        // echo '<hr>';
        // echo '</pre>';
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
    }
}
