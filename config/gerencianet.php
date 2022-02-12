<?php

return [
    'status' => [
        "new" => "Novo",
        "waiting" => "Aguardando Pagamento",
        "paid" => "Pago",
        "unpaid" => "Não Pago",
        "refunded" => "Pagamento devolvido",
        "contested" => "Pagamento Contestado",
        "canceled" => "Pagamento Cancelado",
        "settled" => "Marcado como pago",
        "link" => "Cobrança associada a link",
        "expired" => "Link de pagamento expirado",
    ],
    'status_code' => [
        "new" => 0,
        "waiting" => 1,
        "paid" => 2,
        "unpaid" => 3,
        "refunded" => 4,
        "contested" => 5,
        "canceled" => 6,
        "settled" => 7,
        "link" => 8,
        "expired" => 9,
    ],
    'code_status' => [
        0 => "new",
        1 => "waiting",
        2 => "paid",
        3 => "unpaid",
        4 => "refunded",
        5 => "contested",
        6 => "canceled",
        7 => "settled",
        8 => "link",
        9 => "expired",
    ],
];

?>