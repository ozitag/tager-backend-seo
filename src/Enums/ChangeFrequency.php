<?php

namespace OZiTAG\Tager\Backend\Seo\Enums;

use OZiTAG\Tager\Backend\Core\Enums\Enum;

class ChangeFrequency extends Enum
{
    const Always = 'always';
    const Hourly = 'hourly';
    const Daily = 'daily';
    const Weekly = 'weekly';
    const Monthly = 'monthly';
    const Yearly = 'yearly';
    const Never = 'never';
}