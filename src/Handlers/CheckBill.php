<?php

namespace Svakode\Svaflazz\Handlers;

use Svakode\Svaflazz\SvaflazzClient;

class CheckBill extends Base
{
    /**
     * CheckBalance constructor.
     * @param string $buyerSkuCode
     * @param string $customerNo
     * @param string $refId
     * @param int $amount
     * @param SvaflazzClient $client
     */
    public function __construct(SvaflazzClient $client, string $buyerSkuCode, string $customerNo, string $refId, int $amount = 0)
    {
        parent::__construct($client);

        $body = [
            'commands' => 'inq-pasca',
            'buyer_sku_code' => $buyerSkuCode,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
            'sign' => $this->sign($refId)
        ];

        if ($amount) {
            $body['amount'] = $amount;
        }

        $this->client->setUrl('/transaction')
            ->setBody($body);
    }
}
