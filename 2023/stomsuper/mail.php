<?php
// Recipient email
$toEmail = 'enottrue@gmail.com';

$status = 0;
$statusMsg = 'Что-то пошло не так! Пожалуйста, повторите попытку через некоторое время.';
if(isset($_POST['contact_submit'])){
    // Get the submitted form data
    $phone = $_POST['phone'];


    // Check whether submitted data is not empty
    if(!empty($phone)){

        if(filter_var($phone, FILTER_SANITIZE_NUMBER_INT) === false){
            $statusMsg = 'Введите корректный телефонный номер';
        }else{
            $emailSubject = 'Запрос обратного звонка с сайта - stomsuper.ru '.$name;
            $htmlContent = '<h2>Контактные данные с формы</h2>
                <h4>Телефон</h4><p>'.$phone.'</p>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: '.$name.'<'.$phone.'>'. "\r\n";

            // Send email
            $sendEmail = mail($toEmail, $emailSubject, $htmlContent, $headers);
            if($sendEmail){
                $status = 1;
                $statusMsg = 'Спасибо! Ваш запрос на обратный звонок был успешно отправлен.';
            }else{
                $statusMsg = 'Не удалось! Ваш контактный запрос не был отправлен, пожалуйста, попробуйте еще раз.';
            }
        }
    }else{
        $statusMsg = 'Пожалуйста, заполните все обязательные поля.';
    }
}

$response = array(
    'status' => $status,
    'message' => $statusMsg
);
echo json_encode($response);
?>
