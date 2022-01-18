<?php
require 'common.php';
$type = $_GET['type'] ?? 'request';
route($type === 'request', function () {
    $alipayGlobal = new Mantoufan\AliPayGlobal(array(
        'client_id' => 'SANDBOX_5Y3A2N2YEB3002022',
        'endpoint_area' => 'ASIA',
        'merchantPrivateKey' => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCfsLCiwlKAiYdtLNoUTxx57SUFFrp4+qEnIn0gCl+bBj9/JiOiG24TSoFlvFAjFiTkL3udOXg9OXwtz0svXLtjrkhAQF7mmfl1Myj/5DrwZJSATO/503ILXBJuyAr64WG1xFl6KPeFfvCeZ6Yo75fIL/vbi7x/8RD7KwrSD4HCebpc+VNSb18ha7wPFDNJ2wgaNVHnPtxwYjiUW2VqBC5GkS1roAH2ernywC2oxXwaOqhxawbBBSMj6S3H73JENY7Sf0fhweKffp0qFqhc3s7lNppo1vTVO+UhVobIkFhpDp/bBddHlc7dCCzqLy65S/0cXyvYjezdkkiKv3pW4EnTAgMBAAECggEAOsRVXLBSmEcEdaMJ5mtuuVgSRZslqJvjbnl8vqvSn0RfXbV1a5TYn3TNxdjVTPQ7Q1ZOEYAyxaVAE8OzkYx40agzoqGNyyNi8ESRlAozvn/lPooRzkiIMbICfo5TrBwBT1kg7Jni7VfXyROvzGTP4LX348W66wKWEzi11LQsNprr9Yty9VHX9xHAcrMvveLYbcjnJbka/XPmoKMpiQzk+q8/7d/IeSkt32TT6cmQGmLcucM68fM859/N/7fUnG8jJ3OvTStFq41RSQxIvknzzoBqFffRbond/XE3zZTR0LAYf4eEGUyd6Ckxl2506ew9awXPsVpZfcUO4+X60OV9kQKBgQDfLn5h9dc1G4q4B4Ge0mkC/wtJejE4nsw5/HNKE0P15RnsmFcruNGebHm3cZIz3TQGE/Y4xMGrMGEowCMsL6MEv0hKsfZxutFxTceykZbyPCqIFNklJBqLhFa+kjtOTShpSyR4ukXupPyStemqXI8bls9BCyHg8f4RD8bhZfMmdwKBgQC3LBvfzBSSzKYRa5YJG7rlRvd0pQKX4dENeBugrPpzcbQcMYXdz0Cg/CGH3yB+50sLGiPEJNSEVlLHXYsjyvP8EXyBf2sdxe0q8aB7RpI0aoEZwREdYthm2KPDNwawl3lWpJmDZZXFH12XWlWluusf5nWV8BwW34PdCOt91/qihQKBgEqzlTnUv6PXBCd02739T4jhNTXy4GbDQDhod25j5Gt5s6Otmf/YbNFKHbN5ICab873VEKUPtoNGPj8VkLBJgZclL11RE9wdW91A24a5lHygBtxlngkAfKIWObKv34nl6ZDUxfBi6OVn8+JnYT7UnFHvuI9c2oogdZngXgEzzp8hAoGBAKpCeMJkWvc8/FwS6cobmXSGq3sj6i4tO3lOnDeUsdPe67CNI8ZSX9uDoNM/xl/PNATkzjwCk/tSle00eSHTA0jZJCbmvjVVhac2I5qStVG9cbTzrann+AhY9Jd/LVu14JZ1ty/YnAc3qXIHCLdc8DKdr8yn/CQSrOom4WX+/LxVAoGAXtOeeYKUvp5KzwFbY+zHm2wpZ2fw+xc7Up/RUeYryFRxXhWw/G3EJHTK7dMadnAYeKaOuE4n9XXmFyuP29QLJ+HCQfuSHOLGbCx3a+j7UsrRbWIcx4vg+YnW1EDd2/Ui8cPCHukRhSm7+jJCjfv2GmatdI73eZ+CQcMS27NTAJY=',
        'alipayPublicKey' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAihzSL26iayp+mj1ipXa7zdQoNDPhTBaxwJ08KZn3ja+G1eFJP445AmbZwGtASGJtbnctuav+ztElJvEU+NvNW3db+EvJXsb9QIj1Elgnt5WCvMDIhUQyDcp/b7WMRZlAyAWbO52sgA9ioAwaNS/jBPtb+8lx0s0bloAVleG7st8Wy7VTXrhOgpMZqsbQfE6dM4PiX7oeU+8NWGWR+pihLYTUsjaY2l+McusfQkBqKvp1bILljbVxBtT66dldCoEPxoCUN4kihwovXhkUzDbVhKFQ8fwrwOTWi2UgNnnMNrtH+cPcJCMz3WMcUaFy0cbQlyQmUbapI3moyPx20m+7jwIDAQAB',
        'is_sandbox' => true,
    ));

    try {
        $result = $alipayGlobal->checkout(array(
            'notify_url' => 'https://www.alipay.com/notify',
            'return_url' => 'https://www.alipay.com',
            'amount' => array(
                'currency' => 'USD',
                'value' => '1',
            ),
            'order' => array(
                'id' => null,
                'desc' => 'Order Desc',
                'extend_info' => array(
                    'china_extra_trans_info' => array(
                        'business_type' => 'MEMBERSHIP',
                    ),
                ),
            ),
            'payment_request_id' => null,
        ));
        header('Location: ' . $result->normalUrl);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});

route($type === 'notify', function () {
    print_r($_SERVER);
    echo 'success';
});

route($type === 'return', function () {
    echo 'Payment completed';
});
