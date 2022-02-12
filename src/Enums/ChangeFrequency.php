<?php

namespace OZiTAG\Tager\Backend\Seo\Enums;

enum ChangeFrequency: string
{
    const Always = 'always';
    const Hourly = 'hourly';
    const Daily = 'daily';
    const Weekly = 'weekly';
    const Monthly = 'monthly';
    const Yearly = 'yearly';
    const Never = 'never';
}