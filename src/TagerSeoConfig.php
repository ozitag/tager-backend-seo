<?php

namespace OZiTAG\Tager\Backend\Seo;

class TagerSeoConfig
{
    private function config($param = null, $default = null)
    {
        return \config('tager-seo' . (empty($param) ? '' : '.' . $param), $default);
    }

    private function getStorageScenario($id)
    {
        return $this->config('scenarios.' . $id);
    }

    public function getOpenGraphScenario()
    {
        return $this->getStorageScenario('openGraph');
    }
}
