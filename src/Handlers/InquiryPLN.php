<?php

namespace Svakode\Svaflazz\Handlers;

use Svakode\Svaflazz\SvaflazzClient;

class InquiryPLN extends Base
{
    /**
     * CheckBalance constructor.
     * @param string $customerNo
     * @param SvaflazzClient $client
     */
    public function __construct(SvaflazzClient $client, string $customerNo)
    {
        parent::__construct($client);
        $this->client->setUrl('/inquiry-pln')
            ->setBody([
                'customer_no' => $customerNo,
                'sign' => $this->sign($customerNo)
            ]);
    }
}
